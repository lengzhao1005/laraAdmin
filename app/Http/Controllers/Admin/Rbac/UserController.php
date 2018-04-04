<?php

namespace App\Http\Controllers\Admin\Rbac;

use App\Handlers\ImageUploadHandler;
use App\Http\Requests\CreateUserRequest;
use App\Repositories\PermissRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $permissRepository;

    public function __construct(PermissRepository $permissRepository)
    {
        $this->permissRepository = $permissRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.permiss.user_list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permiss.user_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request,ImageUploadHandler $imageUploadHandler)//CreateUserRequest
    {
        $save_user_res = $this->permissRepository->createUser($request->only(['name','email','phone','password','is_admin']));

        $save_path = 'upload/images/avatars/'; //图片保存地址 /storage
        $save_name = 'avatar_';         //图片名称
        if($request->avatar) {
            $avatar_res = $imageUploadHandler->save($request->avatar,$save_path,$save_name,150);
            $save_user_res->avatar = $avatar_res['path'];
            $save_user_res->save();
        }

        return redirect('/admin/users/create')->with('status','添加成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
