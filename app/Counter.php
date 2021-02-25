<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    //取消防止注入的设定（对所有字段都不开启诸如保护）
    protected $guarded = [];
}
