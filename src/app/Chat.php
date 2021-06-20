<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'login_id', 'name', 'chat'
    ];

    protected $guarded = [
        'create_at', 'update_at'
    ];

    public function chatgroup(){
        return $this->belongsToMany('App\Chat', 'App\User_chatgroup', 'group_id', 'id');
    }
}
