<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Models\group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;


class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        //redirecting the page to Register component
        return Inertia::render('Register' ) ;
    }
    public function store(Request $request){

            //Validating the registration information
             $this->validate($request ,[
                'name' => 'required|max:255|min:2',
                'email' => 'required|email|max:255',
                'password' => 'required|confirmed|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
            ]);
             //User added to the database
             $user =   User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            //User Logging in
            Auth::attempt($request->only('email','password'));
            //Attaching the user to groups
             $group = group::find([20, 21]);
             $user->groups()->attach($group);


            //redirecting to the HomePage
            return redirect()->route('HomePage');
    }
}
