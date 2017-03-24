<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    //
    public function index()
    {
        return '用户列表';
    }

    public function add()
    {
        return view('admin.addForm');
    }
    public function addData(Request $request)
    {
        dd($request->file('pic')->isValid());
        dd($request->hasFile('pic'));
        dd(storage_path());
        dd(public_path());
        dd(app_path());
        dd(base_path());
        dd($request->pic->move(base_path().'/images', 'abc.jpg'));
        //dd($request->pic->storeAs(base_path().'/images', 'abc.jpg'));
        dd($request->pic);
        dd($request->file('pic'));
        //var_dump($_POST);
        //获取一个数据
        //$name = $request->input('username');
        //$team = $request->input('team', 'sh59');
        //$hobby = $request->input('hobby.*.name');
        dump($request->username);
        dump($request->age);
        dump($request->sex);
        dump($request->all());
        dump(Input::get('username'));
        //dump($request);
        return '添加用户';
    }

    //设置Session
    public function setSess(Request $request)
    {
        //$request->session()->put('admin',['name' => '刘备', 'team' =>['sh59']] );
        //session(['age'=>30, 'team'=>['sh59', 'sh61']]);
        $request->session()->push('admin.team', 'sh56');
        return '设置session';
    }

    //获取Session
    public function getSess(Request $request)
    {
        dump($request->session()->pull('name'));
        dump($request->session()->get('user', 'admin'));
        dump($request->session()->get('name'));
        dump($request->session()->all());
    }

    //删除Session
    public function delSess(Request $request)
    {
        //$request->session()->forget('admin');
        $request->session()->flush();
    }
}
