<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //表名
    //protected $table = 'user';
    //关闭时间戳
    public $timestamps = false;
    //主键
    //protected $primaryKey = 'user_id';
    //protected $fillable = ['name', 'age'];
    protected $guarded = ['sex'];
}
