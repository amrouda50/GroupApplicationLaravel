<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\In;
use Inertia\Inertia;

class LogoutController extends Controller
{
    public function index(){
        Auth::logout();
        return redirect()->back();
    }
}
