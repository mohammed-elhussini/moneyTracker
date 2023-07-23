<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Payment;
use App\Models\User;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    use UploadImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userPayments = User::findOrFail(Auth::id())->payments;
        return view('site.payment.index',compact('userPayments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.payment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentRequest $request , Payment $payment )
    {
        $user = auth()->user();

        if ($request->icon_remove == '1') {
            $payment->icon = '';
        }

        if ($request->hasFile('icon')) {
            $payment->icon = $this->uploadImage('icon', 'uploads/user-' . $user->id . '/payments');
        }

        $payment->create([
            'user_id' => $user->id,
            'name' => $request->input('name'),
            'icon' => $payment->icon,
            'description' => $request->input('description'),
        ]);

        return to_route('payment.index')->with('message', 'تم إضافة طريقه الدفع بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment = Payment::withTrashed()->findOrFail($id);
        return view('site.payment.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        return view('site.payment.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        $user = auth()->user();
        if ($request->icon_remove == '1') {
            $payment->icon = 'null';
        }

        if ($request->hasFile('icon')) {
            $payment->update(['icon' => $this->uploadImage('icon', 'uploads/user-' . $user->id . '/payments')]);
        }

        $payment->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->back()->with('message', 'تم تحديث بيانات طريقه الدفع بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return to_route('payment.index')->with('message','تم نقل طريقه الدفع إلى سله المهملات');
    }

    /**
     * Display a Trash listing of the resource.
     */
    public function trash()
    {
        $userPaymentsTrash = Payment::where('user_id', Auth::id())->
                            onlyTrashed()->
                            get();
        return view('site.payment.trashed', compact('userPaymentsTrash'));
    }

    /**
     * Restore Item.
     */
    public function restore($id)
    {
        $payment = Payment::withTrashed()->where('id',$id);
        $payment->restore();
        return to_route('payment.index')->with('message', 'تم استعاده طريقه الدفع من سله المهملات');
    }

    public function forceDelete($id){
        $payment = Payment::withTrashed()->findOrFail($id);
// Delete associated image
        if (is_file($payment->icon)) {
            unlink($payment->icon);
        }
        // Delete associated image
//        if ($category->icon) {
//            Storage::delete($category->icon);
//        }

        $payment->forceDelete();
        return to_route('payment.index')->with('message', 'تم حذف القسم بنجاح');
    }

}
