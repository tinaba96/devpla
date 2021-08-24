<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'post_id',
        'user_id', //予期せぬ代入を防ぐことができるらしい
        'body',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
        //return $this->belongsTo('App\User', 'user_id');

    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}