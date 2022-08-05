<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function index(){

        return Inertia::render('Login' , ['IsLoggedIn' => Auth::check()]);
    }
    public function login(Request $request){
       //Error Validation
        $this->validate($request , [
            'email' => 'required|email',
            'password' => 'required|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
        ]);
        //Login
        Auth::attempt($request->only('email','password'));
        //redirecting to the HomePage
        return redirect()->route('HomePage');

    }
}
