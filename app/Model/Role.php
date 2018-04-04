<?php

namespace App\Model;

use App\Repositories\PermissRepository;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $fillable = ['name','description','status'];

    /**
     * 定义角色和权限的关系
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Permissions()
    {
        return $this->belongsToMany('App\Model\Permission')->withTimestamps();
    }
    /**
     * 定义角色和管理员的关系
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Users()
    {
        return $this->belongsToMany('App\Model\User')->withTimestamps();
    }

    public function getGroupAttribute($value)
    {
        $grop = config('app.permiss_grop');

        return $grop[$value];
    }
}
