<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
        'user_id', //予期せぬ代入を防ぐことができるらしい
	'file_name',
       	'file_path'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');

    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
        // return $this->belongsTo('App\User', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function getBodyHtmlAttribute($value)
    {
        return $this->body ? Markdown::convertToHtml(e($this->body)) : NULL;
    }
    //アクセサの中でエスケープ処理定義


    public function favorite_users()
    {
	    return $this->belongsToMany(User::class, 'likes', ' post_id', 'user_id')->withTimestamps();
    }

}
