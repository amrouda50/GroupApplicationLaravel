<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AboutUsController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return Inertia::render('AboutUs', [ 'IsLoggedIn' => true , 'UserName' => Auth::user()->name , 'UserEmail' => Auth::user()->email]);
        }
        return Inertia::render('AboutUs', [ 'IsLoggedIn' => false]);

    }
}
