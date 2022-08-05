<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AboutUsController extends Controller
{
    public function index()
    {
        return Inertia::render('AboutUs', ['IsLoggedIn' => Auth::check()]);

    }
}
