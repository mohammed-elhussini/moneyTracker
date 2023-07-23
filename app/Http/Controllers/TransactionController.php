<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Category;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\User;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    use UploadImageTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userTransaction = Transaction::where('user_id', Auth::id())->
                                        with('categories', 'payment','invoices')->
                                        get();
        //$userTransaction = User::findOrFail(Auth::id())->transactions();
        return view('site.transaction.index', compact('userTransaction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $payments = Payment::all();
        return view('site.transaction.create', compact( 'categories', 'payments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionRequest $request,Transaction $transaction)
    {
        $user = auth()->user();
        $transactionData =[
            'user_id'          => $user->id,
            'name'             => $request->input('name'),
            'description'      => $request->input('description'),
            'transaction_date' => $request->input('transaction_date') ? Carbon::parse($request->input('transaction_date'))->format('Y-m-d H:i:s') : now()->format('Y-m-d H:i:s'),
            'cost'             => $request->input('cost'),
            'payment_id'       => $request->input('payment_id'),
            'type'             => $request->input('type'),
        ];
        $transaction = Transaction::create($transactionData);
        // save the transaction's categories
        $transaction->categories()->sync($request->input('categories'));


        // Handle image uploads and create invoices
        if ($request->hasFile('images')) {
            $invoices = [];
            foreach ($request->file('images') as $key => $image) {
                $invoices[$key]['image'] = $this->uploadImage('images.' . $key, 'uploads/user-' . $user->id . '/invoices');
                $invoices[$key]['note'] = $request->input('notes')[$key] ?? null;
                $invoices[$key]['transaction_id'] = $transaction->id;
            }
            $transaction->invoices()->createMany($invoices);
        }

        return to_route('transaction.index')->with('message', 'تم اضافه فاتورة جديدة');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::withTrashed()->findOrFail($id);
        return view('site.transaction.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        $categories = Category::all();
        $payments = Payment::all();
        return view('site.transaction.edit', compact('transaction', 'categories', 'payments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        //dd($request->transaction_date);
        $user = auth()->user();

        $transaction->update([
            'name'             => $request->input('name'),
            'description'      => $request->input('description'),
            'transaction_date' => Carbon::parse($request->input('transaction_date'))->format('Y-m-d H:i:s'),
            'cost'             => $request->input('cost'),
            'type'             => $request->input('type'),
            'payment_id'       => $request->input('payment_id'),
        ]);

        // Update the transaction's categories
        $transaction->categories()->sync($request->input('categories'));

        // Delete selected images
        $selectedImages = $request->input('selected_images');
        if (!empty($selectedImages)) {
            $invoicesToDelete = $transaction->invoices()->whereIn('id', $selectedImages)->get();
            foreach ($invoicesToDelete as $invoice) {
                // Delete the associated image file
                if (is_file($invoice->image)) {
                    unlink($invoice->image);
                }
            }
            // Delete the invoices
            $transaction->invoices()->whereIn('id', $selectedImages)->delete();
        }

        // Insert new images
        if ($request->file('images')) {
            $invoices = [];
            foreach ($request->file('images') as $key => $image) {
                $invoices[$key]['image'] = $this->uploadImage('images.' . $key, 'uploads/user-' . $user->id . '/invoices');
                $invoices[$key]['note'] = $request->input('notes')[$key];
                $invoices[$key]['transaction_id'] = $transaction->id;
            }
            $transaction->invoices()->createMany($invoices);
        }

        // Update existing notes
        $existingInvoices = $transaction->invoices;
        foreach ($existingInvoices as $key => $existingInvoice) {
            $existingInvoice->update(['note' => $request->input('notes')[$key]]);
        }

        return to_route('transaction.index')->with('message', 'تم تحديث الفاتورة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return to_route('transaction.index')->with('message','تم نقل الفاتورة إلى سله المهملات');
    }


    /**
     *
     **/
    public function trash()
    {
        $userTransactionsTrash = Transaction::where('user_id', Auth::id())->
                                onlyTrashed()->
                                get();
        return view('site.transaction.trashed', compact('userTransactionsTrash'));
    }

    /**
     * Restore Item.
     */
    public function restore($id)
    {
        $payment = Transaction::withTrashed()->where('id',$id);
        $payment->restore();
        return to_route('transaction.index')->with('message', 'تم استعاده طريقه الدفع من سله المهملات');
    }

    public function forceDelete($id){
        $transaction = Transaction::withTrashed()->findOrFail($id);
        $transaction->forceDelete();
        return to_route('transaction.index')->with('message', 'تم حذف الفاتورة بنجاح');
    }
}
