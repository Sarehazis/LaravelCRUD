<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function proseslogin(Request $request)
    {
        $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $request->email)->first();
        if (empty($user)) 
    {
        return redirect()->back()->with('error', 'Email not found');
    }

    if (Hash::check($request->password, $user->password) == false)
    {
        return redirect()->back()->with('error', 'Password not match');
    }

    Auth::login($user);
    return redirect()->route('admin.projects.index');
}

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
