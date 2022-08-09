<?php

namespace App\Http\Controllers;

use App\Models\group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class GroupController extends Controller
{
    public function index(){
        return group::all();
    }
    public function create(Request $request){
        $this->validate($request , [
            'name' => 'required',
            'description' => 'min:8|nullable',
        ]);

        group::factory()->create(['name' => $request->name,
            'description' =>  $request->description,
        ]);
        return redirect()->back();
    }
    public function destroy($id){

        group::find($id)->delete();
        return redirect()->route('HomePage');
    }
    public function edit($id , Request $request){
        DB::table('groups')->where('id', $id)->update(['name' => $request->name, 'description' =>$request->description ]);
        return redirect()->route('HomePage');
    }
}
