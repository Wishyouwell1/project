<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url('dist/css/bootstrap.css')}}">
    <title>Document</title>
    <style>
        #tb th,#tb td{
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>用户列表</h1>
        <table class="table table-hover" id="tb">
            <thead>
            <tr>
                <th>ID</th>
                <th>用户名</th>
                <th>年龄</th>
                <th>性别</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th>{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->age}}</td>
                    <td>{{$user->sex}}</td>
                    <td><a href='' class="btn btn-danger btn-sm">修改</a> <a class="btn btn-success btn-sm">删除</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$users->links('admin.selfPage')}}
    </div>
</body>
</html>
