<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

        /**
     * 現在のユーザー、または引数で渡されたIDが管理者かどうかを返す
     *
     * @param  number  $id  User ID
     * @return boolean
     */
    public function isAdmin($id = null) {
        $id = ($id) ? $id : $this->id;
        return $id == config('admin_id');
    }


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    public function posts()
    {
        return $this->hasMany('App\Post');
    }



    public function likes()
    {
	    return $this->belongsToMany('App\Post')->withTimestamps();
	    //return $this->belongsToMany(Posts::class, 'likes', 'user_id')->withTimestamps();
    }

    public function like($post_id)
    {
	    $exist = $this->is_like($post_id);

	    if ($exist){
		    return false;
	    }else{
		    $this->likes()->attach($post_id);
		    return true;
	    }
    }

    public function unlike($post_id)
    {
	    $exist = $this->is_like($post_id);

	    if($exist){
		    $this->likes()->detach($post_id);
		    return true;
	    }else{
		    return false;
	    }
    }

    public function is_like($post_id)
    {
	    return $this->likes()->where('post_id'. $post_id)->exists();
    }

}

