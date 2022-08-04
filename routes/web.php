<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('HomePage' ) ;
});
Route::get('/register', function () {
    return Inertia::render('Register' ) ;
});
Route::get('/login', function () {
    return Inertia::render('Login' ) ;
});
Route::get('/aboutUs', function () {
    return Inertia::render('AboutUs' ) ;
});
