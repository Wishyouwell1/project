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
    return view('welcome');
});
//后台显示
/*Route::group(['prefix'=>'admin', 'namespace' => 'Admin'], function () {
    Route::get('index/{id?}', 'IndexController@index');
    Route::get('user/', 'UserController@index');
    Route::get('goods/', 'GoodsController@index');
    //添加用户
    Route::get('user/add', 'UserController@add');
    Route::post('user/addData', 'UserController@addData');
    //session操作
    Route::get('user/setSess', 'UserController@setSess');
    Route::get('user/getSess', 'UserController@getSess');
    Route::get('user/delSess', 'UserController@delSess');
});
//前台显示
Route::group(['prefix' => 'home', 'namespace' => 'Home'], function () {
    Route::get('index', 'IndexController@index');
    Route::get('goods', 'GoodsController@index');
    Route::get('user', 'UserController@index');
});*/
//后台用户登录
Route::group(['prefix'=>'admin', 'namespace' => 'Admin'], function () {
    Route::any('login', 'IndexController@login');
    /*Route::group(['middleware' => 'admin.login'], function () {
        Route::get('index', 'IndexController@index');
        Route::get('userlist', 'UserController@index');
        Route::get('goodslist', 'GoodsController@index');
    });*/
    Route::get('index', 'IndexController@index')->middleware('login');
    Route::get('userlist', 'UserController@index');
    Route::get('goodslist', 'GoodsController@index');
});
Route::get('admin/register', 'Admin\IndexController@register');
Route::post('admin/registerCheck', 'Admin\IndexController@registerCheck');
Route::get('admin/sql', 'Admin\IndexController@showSql');
//分页
Route::get('admin/page', 'Admin\IndexController@page');
//模型操作
Route::get('admin/orm', 'Admin\IndexController@orm');


