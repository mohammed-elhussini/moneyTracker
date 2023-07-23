<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function showLoginForm()
    {
        if(!session()->has('previousUrl'))
        {
            session(['previousUrl' => url()->previous()]);
        }

        return view('site.auth.login');
    }

    public function login()
    {
        //dd(request());

        $credentials = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
            // Authentication passed...
            return redirect()->intended(session()->get('previousUrl'))->with('message', 'تم تسجيل الدخول');
        }

        return back()->withErrors([
            'email' => 'خطأ في اسم المستخدم أو كلمة المرور'
        ])->onlyInput('email')->with('messageError', 'خطأ في التسجيل');
    }

    public function showRegistrationForm()
    {
        return view('site.auth.register');
    }

    public function register()
    {
        //dd(request());
        $attributes = request()->validate([
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);
        $attributes['password'] = Hash::make($attributes['password']);
        $user = User::create($attributes);
        auth()->login($user);
        return redirect()->route('home')->with('message', 'تم التسجل بنجاح');
    }

    public function logout()
    {
        Auth::logout();
        // Clear the user's session data
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login')->with('messageError', 'تم تسجيل الخروج بنجاح');
    }

    public function lostPassword(){
        return view('site.auth.lostPassword');
    }

}
