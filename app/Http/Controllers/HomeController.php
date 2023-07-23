<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
//        $user = User::find(Auth::id());
        //dd($user->username);

        $today = Carbon::today()->toDateString();
        $transactionsToday = Transaction::where('user_id', Auth::id())->
                            with('categories', 'payment', 'invoices')->
                            whereDate('transaction_date', '=', $today)->
                            get();

        $categories = Category::where('user_id', Auth::id())->get();
        $payments = Payment::where('user_id', Auth::id())->get();
        $transactions = Transaction::where('user_id', Auth::id())->get();

        return view('site.index', compact('categories','payments','transactions','transactionsToday'));
    }
}
