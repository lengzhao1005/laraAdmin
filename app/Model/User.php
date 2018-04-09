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
        'name', 'phone', 'email', 'password', 'avatar', 'confirmation_token', 'api_token', 'settings','is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','confirmation_token',
    ];

    public function Roles()
    {
        return $this->belongsToMany('App\Model\Role')->withTimestamps();
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = encrypt($value);
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

    public static function getUserAndRole($skip='',$limit='')
    {
        if($skip!=='' && $limit!==''){
            $data = self::where('is_admin',1)->with('Roles')->skip($skip)->take($limit)->get();
        }else{
            $data = self::where('is_admin',1)->with('Roles')->get();
        }


        return $data->map(function ($item){
            $role_name = $item->Roles->map(function ($role){
                return $role->name;
            });
            $item->roles_str = implode(',',$role_name->toArray());
            return $item;
        });
    }
}
