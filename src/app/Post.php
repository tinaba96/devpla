<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
    ];

    protected $dates = [
        'traded_day', //追加する。
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function user()
    {
    }

}