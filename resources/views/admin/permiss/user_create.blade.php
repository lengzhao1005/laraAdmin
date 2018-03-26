@extends('admin.admin')
@section('content-header')
    <h1>
        用户与权限
        <small>添加用户</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/admin/index')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">用户与权限 -  添加用户</li>
    </ol>
@stop

@section('content')
    <h2 class="page-header">
        <a href="{{url('admin/users')}}">
            <button class="btn btn-lg btn-info"><i class="fa icon ion-arrow-left-c"></i>用户列表</button>
        </a>
    </h2>

    <form action="{{url('admin/users')}}" method="post" enctype="multipart/form-data">

        {{--后台添加用户，默认激活--}}
        <input type="hidden" name="is_active" value="1">
        {{csrf_field()}}
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">添加用户</h3>
            </div>

            <div class="box-body">
                <!-- name -->
                <div class="form-group">
                    <label>用户昵称</label>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback text-red">
                            (<span style="text-align: right">{{ $errors->first('name') }}</span>)
                        </span>
                    @endif

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa glyphicon glyphicon-user"></i>
                        </div>
                        <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" required maxlength="30" name="name" value="{{ old('name') }}" placeholder="请输入用户昵称">
                    </div>
                </div>

                {{--emil--}}
                <div class="form-group">
                    <label>用户邮箱</label>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback text-red">
                            (<span style="text-align: right">{{ $errors->first('email') }}</span>)
                        </span>
                    @endif

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa glyphicon glyphicon-envelope"></i>
                        </div>
                        <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" required name="email" value="{{ old('email') }}" placeholder="请输入用户邮箱">
                    </div>
                </div>

                {{--password--}}
                <div class="form-group">
                    <label>登录密码</label>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback text-red">
                            (<span style="text-align: right">{{ $errors->first('password') }}</span>)
                        </span>
                    @endif

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa glyphicon glyphicon-lock"></i>
                        </div>
                        <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" required name="password" value="" placeholder="请输入用户登录密码">
                    </div>
                </div>

                {{--confirm-password--}}
                <div class="form-group">
                    <label>确认登录密码</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa glyphicon glyphicon-lock"></i>
                        </div>
                        <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" value="" placeholder="请输入用户登录密码">
                    </div>
                </div>

                <!-- avatar -->
                <div class="form-group">
                    <label for="exampleInputFile">用户头像</label>
                    <input type="file" name="avatar" id="exampleInputFile">
                </div>

                <div class="form-group">

                    <div class="input-group" style="width: 50%;margin: 0 auto;">
                        <input type="submit" class="btn btn-success btn-block">
                    </div>
                </div>
            </div>

        </div>
    </form>
@stop

