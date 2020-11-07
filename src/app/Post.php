<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
        'user_id' //予期せぬ代入を防ぐことができるらしい
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}