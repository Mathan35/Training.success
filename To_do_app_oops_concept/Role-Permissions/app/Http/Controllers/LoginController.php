<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    //login-form
    public function LoginForm(){
        return view('auth.login');
    }

    //login
    public function Login(Request $request){

        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        $remember = $request->remember;

        if (Auth::attempt($credentials,$remember)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'name' => 'The provided credentials do not match our records.',
        ]);
    }
    public function LogoutUser(Request $request){

        Auth::logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
