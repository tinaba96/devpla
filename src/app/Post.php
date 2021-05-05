<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
        'user_id', //予期せぬ代入を防ぐことができるらしい
	'file_name',
       	'file_path'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
        //return $this->belongsTo('App\User');
    }

    public function favorite_users()
    {
	    return $this->belongsToMany(User::class, 'likes', ' post_id', 'user_id')->withTimestamps();
    }

}
