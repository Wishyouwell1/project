<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
class IndexController extends Controller
{
    //显示首页
    public function index()
    {

        return '<h1>前台首页</h1>';
    }
}