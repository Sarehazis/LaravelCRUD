<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function prosesregister(Request $request)
    {

        // dd($request->all());
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'verify_key' => $request->verify_key,
            'password' => Hash::make($request->password),
            'role' => 'admin',
            
        ]);
        if ($user) {
            Session::flash('success', 'Register Success');
            return redirect()->route('login');
        }
    }


}

