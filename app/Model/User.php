<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'confirmation_token', 'api_token', 'settings'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Roles()
    {
        return $this->belongsToMany('App\Model\Role');
    }

    public function IsActive()
    {
        return [
            '0'=>[
                'comment'=>'未激活',
                'color'=>'red'
            ],
            '1'=>[
                'comment'=>'已激活',
                'color'=>'green'
            ]
        ];
    }
}
