<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'url', 'description', 'status'
    ];

    public static function getPermission()
    {
        return self::where('status','T')->get();
    }

    public static function getAllPermissionByGroup()
    {
        $permissions = self::where('status','T')->orderBy('group')->get();

        return $permissions->mapToGroups(function($item,$key){

            return [$item->group => $item];
        });
    }
}
