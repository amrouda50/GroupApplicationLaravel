<?php

namespace App\Http\Controllers;

use App\Models\group;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return User::all()->each(function ($user) {
            return  array_merge(['groups' => $user->groups], (array) $user);
        });
    }
}
