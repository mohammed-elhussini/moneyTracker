<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Category;
use App\Models\User;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    use UploadImageTrait;

    public function index()
    {
        //$user = User::find(Auth::id());
        $user = User::with('categories.transactions')->find(Auth::id());
        $userCats = $user->categories;
        return view('site.profile.index', compact('user', 'userCats'));
    }

    public function profile_action(UpdateProfileRequest $request)
    {
        //dd(request());
        $user = auth()->user();
        if ($request->avatar_remove == '1') {
            $user->avatar = 'null';
        }

        if ($request->hasFile('avatar')) {
            $user->update(['avatar' => $this->uploadImage('avatar', 'uploads/user-' . $user->id . '/profile')]);
        }

        $user->update([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            //'avatar'    => $request->hasFile('avatar') ? $this->uploadImage('avatar', 'uploads/user') : '',
        ]);

        return redirect()->back()->with('message', 'تم تحديث البيانات الشخصية');
    }

    public function password_update(UpdatePasswordRequest $request)
    {
//        $user = User::find(Auth::id());
        $user = auth()->user();
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);
        return redirect()->back()->with('message', 'تم تحديث كلمة المرور بنجاح.');
    }
}
