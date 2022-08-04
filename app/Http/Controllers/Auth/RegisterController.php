<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;


class RegisterController extends Controller
{
    public function index()
    {
        return Inertia::render('Register' ) ;
    }
    public function store(Request $request){
             $this->validate($request ,[
                'name' => 'required|max:255|min:2',
                'email' => 'required|email|max:255',
                'password' => 'required|confirmed|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',

            ]);

    }
}
