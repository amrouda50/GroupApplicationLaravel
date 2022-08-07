<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use phpDocumentor\Reflection\Types\Boolean;

class HomePageController extends Controller
{
    public function index(){
        if(Auth::check()){
            return Inertia::render('HomePage' , [ 'IsLoggedIn' => true , 'UserName' => Auth::user()->name , 'UserEmail' => Auth::user()->email]);
        }
        return Inertia::render('HomePage' , [ 'IsLoggedIn' => false]);
    }
}
