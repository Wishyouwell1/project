<?php
namespace App\Http\Controllers;
class IndexController extends Controller
{
    public function index()
    {
        //显示首页
        return view('admin.index');
    }
}