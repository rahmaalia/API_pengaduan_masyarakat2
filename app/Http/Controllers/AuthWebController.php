<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;

class AuthWebController extends Controller
{
    public function login(){
        return view ('auth.login');
    }

    public function postlogin(Request $request){
        $username = $request->username;
        $password = $request->password;

        if(Auth::guard('web')->attempt(['username'=> $username, 'password' => $password])){
            return redirect('/dashboard');
        }
        
        return redirect()->intended('/login');
    }

    public function logout()
    {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }

        return redirect('/login');
    }
}
