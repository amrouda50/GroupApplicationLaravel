<?php

namespace App\Http\Controllers;

use App\Models\group;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use phpDocumentor\Reflection\Types\Boolean;

class HomePageController extends Controller
{
    public function index(){
        return Inertia::render('HomePage' , [ 'UserName' => Auth::user()->name , 'UserEmail' => Auth::user()->email]);
    }
}
