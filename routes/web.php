<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use \App\Http\Controllers\Auth\HomePageController;
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


Route::get('/', [HomePageController::class , 'index'])->name('HomePage');
Route::get('/register',[RegisterController::class , 'index']);
Route::post('/register',[RegisterController::class , 'store']);
Route::get('/login', function () {
    return Inertia::render('Login' ) ;
});
Route::get('/aboutUs', function () {
    return Inertia::render('AboutUs' ) ;
});

