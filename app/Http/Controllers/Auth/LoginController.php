<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Validation\ValidationException;
class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

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
        if(!Auth::attempt($request->only('email','password') , $request->remember)){
        throw ValidationException::withMessages(['credentials' => 'Invalid credentials']);
        }
        //redirecting to the HomePage
        return redirect()->route('HomePage');

    }
}
