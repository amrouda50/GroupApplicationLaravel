<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class group extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
    ];

    public function users() {
        return $this->belongsToMany(User::class);
    }
    public function groups(){
        return $this->belongsToMany(group::class, 'group_group', 'parent_group_id', 'group_id');
    }

    public static function tree()
    {
        $group_groups = DB::table('group_group')->get();
        $groups = group::all();
        return self::resursive_tree($groups, $group_groups);
    }

    private static function resursive_tree($groups, $group_groups, $root = true) {
        $rootGroups = [];

        foreach ($groups as $group) {
            $condition = $root
                ? $group_groups->whereIn('group_id', $group->getAttribute('id'))->isEmpty()
                : !$group_groups->whereIn('parent_group_id', $group->getAttribute('id'))->isEmpty();
            if ($condition) {
                if (count($group->groups) > 0) {
                    $group->groups = self::resursive_tree($group->groups, $group_groups, false);
                }
                $group = array_merge(['users' => $group->users, 'groups' => $group->groups], $group->toArray());
                $rootGroups[] = $group;
            }
        }

        return  $rootGroups;
    }
}
