<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    public function index(){
            $userTransaction = Transaction::where('user_id', Auth::id())->
                                with('categories', 'payment')->
                                get();
        return view('site.calendar.index',compact('userTransaction'));
    }
}
