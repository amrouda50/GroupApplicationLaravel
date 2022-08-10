<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\GroupController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('users')->group(function () {
    Route::get('/' , [UserController::class , 'index'] );
});

Route::prefix('groups')->group(function () {
    Route::get('/' , [GroupController::class , 'index'] );
    Route::delete('/{id}' , [GroupController::class, 'destroy'] );
    Route::delete('{groupId}/users/{userId}' , [GroupController::class, 'removeUser'] );
    Route::put('{groupId}/users/{userId}' , [GroupController::class, 'addUser'] );
    Route::put('/replaceuser' , [GroupController::class, 'replaceUser'] );
    Route::put('/{id}' , [GroupController::class, 'edit'] );
    Route::post('/' , [GroupController::class , 'create'] );
    Route::put('/group/replace' , [GroupController::class, 'replacegroup'] );


});
