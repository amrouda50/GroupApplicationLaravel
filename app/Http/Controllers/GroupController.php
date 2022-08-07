<?php

namespace App\Http\Controllers;

use App\Models\group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(){
        return group::all();
    }
    public function create(Request $request){
        $this->validate($request , [
            'name' => 'required',
            'description' => 'min:8',
        ]);
        group::factory()->create(['name' => $request->name,
            'description' =>  $request->description,
        ]);

        return 'Success';
    }
}
