<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function User()
    {
        return $this->belongsToMany('App\Model\User');
    }
}
