<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    //显示首页
    public function index(Request $request)
    {
        return '<h1>后台首页</h1>';
    }

    //用户登录
    public function login(Request $request)
    {
        //判断是那种请求
        if ($request->isMethod('post')) {
            //获取提到过来的用户名和密码
            $username = $request->input('username', '');
            $password = $request->input('password', '');
            //dump($username);
            //dump($password);
            //链接数据库
            $link = mysqli_connect('localhost', 'root', '');
            //选择数据库
            mysqli_select_db($link, 'sh59');
            //设置字符集
            mysqli_set_charset($link, 'utf8');
            //准备sql语句，完成执行sql
            $sql = "select * from users where name='{$username}' and password = '{$password}'";
            $result = mysqli_query($link, $sql);
            $user = mysqli_fetch_assoc($result);
            //dd($user);
            //保存到session
            $request->session()->put('user', $user);
            return redirect('admin/index');
            //return 'post请求';
        }
        return view('admin.login');
    }

    //注册表单
    public function register()
    {
        return view('admin.register');
    }

    //验证数据
    public function registerCheck(Request $request)
    {
        //验证规则
        $roles = [
            'username' => 'required|between:6,12',
            'password' => 'required|confirmed'
        ];
        //自定义的错误信息
        $msg = [
            'required' => ':Attribute不能为空',
            'between' => ':Attribute必须在:min和:max之间',
            'confirmed' => '两次密码不一致',
        ];
        //$this->validate($request, $roles, $msg);

        $validator = Validator::make($request->all(), $roles, $msg);
        //dd($validator->fails());
        //dd($validator->passes());
        if ($validator->fails()) {
            //验证失败
            return redirect('admin/register')->withErrors($validator);
        }
        return '验证';
    }

    public function showSql()
    {
        /****************基本使用************/
        //$connection = DB::connection()->getPdo();
        //$resutl = DB::select("select * from stu");
        //$resutl = DB::select("select * from stu where id = ?", [1]);
        //$resutl = DB::select("select * from stu where id = :id", ['id'=>1]);
        /*$data = [
            '张角','50','0','sh32','176.54'
        ];
        //$resutl = DB::insert("insert into stu(name,age,sex,class,height) values(?,?,?,?,?)", $data);
        $data = [
            'name' => '刘备',
            'id' => 1
        ];
        //$result = DB::update("update stu set name=:name where id=:id", $data);
        //$result = DB::delete("delete from stu where id=?", [18]);*/

        /****************查询构建器************/
        //$result = DB::table('stu')->get();
        //$result = DB::table('stu')->get()->toArray();
        /*foreach ($result as $stu) {
            dump($stu->name);
        }*/
        //$result = DB::table('stu')->get();
        //dd($result);
        //$result = DB::table('stu')->where('id', 1)->value('name');
        //$result = DB::table('stu')->pluck('name', 'id');
        /*$result = DB::table('stu')->count();
        $result = DB::table('stu')->min('age');
        $result = DB::table('stu')->max('age');
        $result = DB::table('stu')->avg('age');*/
        //$result = DB::table('stu')->select('name', 'age')->get();
        //$result = DB::table('stu')->select('name as user_name', 'age')->get();
        //$result = DB::table('stu')->select(DB::Raw("count(*) as num,class"))->groupBy('class')->get();
        /*$result = DB::table('stu')
                    //->join('grade', 'stu.class', '=', 'grade.class')
                    //->crossJoin('grade')
                    //->rightJoin('grade', 'stu.class', '=', 'grade.class')
                    /*->join('grade', function ($join) {
                        $join->on('stu.class', 'grade.class')
                             ->where('grade.class', 'sh59');
                    })
                    ->get();*/
        /*$first = DB::table('stu')->where('sex', '0');
        $result = DB::table('stu')
                ->where('age', '>', '30')
                ->union($first)
                ->get();*/
        //$result = DB::table('stu')->where('id','1')->get();
        //$result = DB::table('stu')->where('id','=','1')->get();
        //$result = DB::table('stu')->where('id','>','10')->get();
        //$result = DB::table('stu')->where('id','<','10')->get();
        //$result = DB::table('stu')->where('id','!=','10')->get();
        /*$result = DB::table('stu')
                //->where('id','<','10')
                //->where('age','>','25')
                ->where([
                    ['id', '>', '10'],
                    ['age', '>', '30'],
                    ['name', 'like', '%刘备%'],
                ])
                ->get();*/
        /*$result = DB::table('stu')
                    ->where('sex', '0')
                    ->orWhere('age', '>', '30')
                    ->get();*/
        /*$result = DB::table('stu')
                ->select(DB::Raw('class, count(*) as num'))
                ->groupBy('class')
                ->get();*/
        /*$result = DB::table('stu')
                    ->orderBy('id', 'desc')
                    ->orderBy('age', 'asc')
                    ->get();*/
        /*$result = DB::table('stu')
                //->skip(2)
                ->offset(2)
                //->take(3)
                ->limit(3)
                ->get();*/
        /*$result = DB::table('stu')
                    ->inRandomOrder()
                    ->first()->id;*/
        /*$result = DB::table('stu')
                    ->select(DB::Raw('class, count(*) as num'))
                    //->having('num', '>', '4')
                    ->havingRaw('num > 4')
                    ->groupBy('class')
                    ->get();*/
        /*$ids = [1,2,3, 4, 5];
        $ids = null;    //

        $result = DB::table('stu')
                    ->when($ids, function ($query) use($ids) {
                        return $query->whereIn('id', $ids);
                    }, function ($query) {
                        return $query->orderBy('id', 'desc');
                    })->get();*/
        //$result = DB::table('stu')->insert(
        /*$result = DB::table('stu')->insertGetId(
            [
                'name' => '贾诩',
                'age' => 30,
                'sex' => 0,
                'class' => 'sh64',
                'height' => '176.34'
            ]
        );*/
        /*$result = DB::table('stu')
                ->where('id', 1)
                ->update(
                    [
                        'name' => '刘小备',
                        'age' => 32
                    ]
                );*/
        /*$result = DB::table('stu')
                ->where('id', 1)
                ->increment('age', 10);*/
                //->decrement('age', 10);
        $result = DB::table('stu')
                    ->where('id', '20')
                    ->delete();
        dd($result);
        /*dump(env('DB_CONNECTION'));
        dump(env('DB_HOST'));
        dump(env('DB_DATABASE'));*/
    }
    public function page()
    {
        $where = [
            'name' => '刘备',
            'age' => '30'
        ];:
        //$result = DB::table('stu')->where('id', '>', 10)->paginate(3);
        $result = DB::table('stu')->paginate(3);
        //$result = DB::table('stu')->simplePaginate(3);
        //dd($result);
        //$result->setPath('admin/list');
        return view('admin.page',['users' => $result]);
    }
    public function orm()
    {
        /*$user = new User();
        //dd($user);
        $user->name = '诸葛亮';
        $user->age = 30;
        $user->sex = 0;
        $res = $user->save();*/
        //$res = User::where('id', '>', '3')->first();
        //$res = User::find(3);
        //$res = User::find([1,3,4]);
        //$res = User::findOrFail(10);
        //abort(404);
        //$res = User::where('id', '>', '3')->count();
        /*$users = new User();
        $users->name = '曹操';
        $users->age = 32;
        $users->sex = 0;
        $res = $users->save();*/
        $res = User::create([
            'name' => '张辽',
            'age' => 28,
            'sex' => 100
        ]);
        dd($res);
        /*foreach ($res as $user)
        {
            dump($user->name);
        }*/
    }
}