<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes; //追記
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes; //追記

    protected $dates = ['deleted_at']; //追記

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_image',
        'my_skills',
        'topics_interest',
        'edu_background',
        'work_history',
        'achieve_quali',
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

    public function follows(){
        return $this->hasMany('App\Follow', 'follow_id', 'id');
    }

    public function followers(){
        return $this->belongsToMany('App\User', 'follows', 'follow_id', 'user_id');
    }

    public function following(){
        return $this->belongsToMany('App\User', 'follows', 'user_id', 'follow_id');
    }

    public function is_following($followed_id){
        if ($this->following()->where('follow_id', $followed_id)->count() > 0){
            return true;
        }else{
            return false;
        }
    }


}

