<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthWebController extends Controller
{
    public function login(){
        return view ('auth.login');
    }

    public function postlogin(Request $request){
        if(Auth::attemp($request->only('username','password'))){
            return redirect('/dashboard');
        }
        return redirect('/login');
    }
}
