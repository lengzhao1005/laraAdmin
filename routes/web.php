<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    /*for($i=1007;$i<=1020;$i++){
        $step1=base64_encode($i);
        $step2=strrev($step1);
        $res = base64_encode($step2);
        $str_res = "http://pv.visastandards.com/pay/wx?id_merchant={$res}==";

        echo $str_res;

    }

    exit;*/
    /*$data = [];
    for($i=3017;$i<=5017;$i++) {
        $data[$i]['allpay_mno'] = '86570004';
        $data[$i]['id_wxplatform'] = 1;
        $data[$i]['mchreturn'] = 20;
        $data[$i]['createtime'] = date('Y-m-d H:i:s');
        $data[$i]['feerate'] = 30;
        $data[$i]['remain_cash'] = 0;
    }*/
    //dd($data);
    //$res = DB::connection('mysql_yinzhun')->table('merchant')->insert($data);
    //dd($res);
    /*$i=8;
    $step1=base64_encode($i);
    $step2=strrev($step1);
    $res = base64_encode($step2);
    dump($res);*/

    /*$monolog = \Log::getMonolog();

    $monolog->popHandler();
    \Log::useDailyFiles(storage_path().'logs/job/errpr.log');
    \Log::info('test');*/
    return view('welcome');
});

Route::get('/test',function(){
    return view('test');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//==============================后台
Route::group(['namespace'=>'Admin','prefix'=>'admin'],function(){
    //==========================首页
    Route::get('/index','AdminController@index');

    //==========================rbac
    Route::resource('users','Rbac\UserController');
    Route::resource('roles','Rbac\RoleController');
    Route::resource('permissions','Rbac\PermissionController');
});
