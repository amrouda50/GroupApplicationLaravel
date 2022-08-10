<?php

namespace App\Http\Controllers;

use App\Models\group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Inertia\Inertia;

class GroupController extends Controller
{
    public function index() {
        return group::tree();
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
        group::remove_from_groups($id);
        group::find($id)->delete();
        return redirect()->route('HomePage');
    }
    public function removeUser( $groupId ,$userId){

        $this->userRemove($groupId , $userId);
        return redirect()->route('HomePage');
    }

    private function userRemove( $groupId ,$userId){
        $group = group::find($groupId);
        $user = User::find($userId);
        $user->groups()->detach($group);
    }

    private function userAdd( $groupId ,$userId){
        $group = group::find($groupId);
        $user = User::find($userId);

        if($group->users->contains($user)){
            return false;
        }
        $user->groups()->attach($group);
        return true;
    }

    public function addUser( $groupId ,$userId){
        $this->userAdd($groupId, $userId);
        return redirect()->route('HomePage');
    }

    public function edit($id , Request $request){
        DB::table('groups')->where('id', $id)->update(['name' => $request->name, 'description' =>$request->description ]);
        return redirect()->route('HomePage');
    }

    public function replaceUser(Request $request){
        $this->userRemove($request->get('from')['id'] , $request->get('user')['id']);
        $this->userAdd( $request->get('to')['id'] , $request->get('user')['id'] );
        return redirect()->route('HomePage');
    }

    public function replacegroup(Request $request){
        $group_from = $request->hasAny('from') ? group::find($request->get('from')['id']) : null;
        $group_to = $request->has('to') ? group::find($request->get('to')['id']) : null;
        $group = group::find($request->get('group')['id']);
        if($group_to && $group_to->id === $group->id) {
            return redirect()->route('HomePage');
        }
        if ($group_from) {
            group::remove_from($group_from->id, $group->id);
        }

        if ($group_to) {
            group::insert_to($group_to->id, $group->id);
        }
        return redirect()->route('HomePage');
    }
}
