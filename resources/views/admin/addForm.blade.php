<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>用户添加</title>
</head>
<body>
    <h1>用户添加</h1>
    <form action="addData" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <p>用户名:<input type="text" name="username" value=""></p>
        <p>年龄:<input type="text" name="age" value=""></p>
        <p>性别:<input type="text" name="sex" value=""></p>
        <p><input type="text" name="hobby[][name]" value=""></p>
        <p><input type="text" name="hobby[][name]" value=""></p>
        <p><input type="text" name="hobby[][name]" value=""></p>
        <p><input type="file" name="pic" value=""></p>
        <p><input type="submit" value="添加"></p>
    </form>
</body>
</html>