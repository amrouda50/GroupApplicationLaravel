<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HomePageController extends Controller
{
    public function index(){
        return Inertia::render('HomePage' , [ 'IsLoggedIn' => Auth::check()]);
    }
}
