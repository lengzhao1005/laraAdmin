@extends('admin.admin')
@section('content-header')
    <h1>
        用户与权限
        <small>用户列表</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/admin/index')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">用户与权限 -  用户列表</li>
    </ol>
@stop

@section('content')
    <h2 class="page-header">
        <a href="#">
            <button class="btn btn-lg btn-info"><i class="fa icon ion-plus"></i>添加用户</button>
        </a>
    </h2>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">
                用户列表
            </h3>
            <div class="box-tools">
                <form action="" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control input-sm pull-right" name="s_title"
                               style="width: 150px;" placeholder="搜索用户">
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-hover table-bordered">
                <tbody>
                <!--tr-th start-->
                <tr>
                    <th>操作</th>
                    <th>昵称</th>
                    <th>邮箱</th>
                    <th>是否验证</th>
                    <th>注册时间</th>
                    <th>角色</th>
                </tr>
                <!--tr-th end-->
                <tr>
                    <td>
                        <a style="font-size: 16px" href="#"><i class="fa fa-fw fa-pencil" title="修改"></i></a>
                        <a style="font-size: 16px" href="#"><i class="fa fa-fw fa-trash-o" title="删除"></i></a>
                    </td>
                    <td class="text-muted">Tom</td>
                    <td class="text-muted">267223412@qq.com</td>
                    <td class="text-muted">1</td>
                    <td class="text-navy">2017-03-22 20:08:43</td>
                    <td class="text-navy">普通用户</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop

