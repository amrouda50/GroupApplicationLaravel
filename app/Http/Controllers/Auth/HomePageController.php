<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HomePageController extends Controller
{
    public function index(){
        return Inertia::render('HomePage' , [ 'IsLoggedIn' => Auth::check()]);
    }
}
