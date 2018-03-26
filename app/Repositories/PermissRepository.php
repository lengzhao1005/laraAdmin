<?php
/**
 * Created by PhpStorm.
 * User: zhao
 * Date: 2018/3/21
 * Time: 18:06
 */

namespace App\Repositories;


use App\Handlers\ImageUploadHandler;
use App\Model\User;

class PermissRepository
{
    public function createUser($user_data)
    {
        $user = User::create($user_data);
        dd($user);
    }
}