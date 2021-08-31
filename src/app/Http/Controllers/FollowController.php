<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Follow;

class FollowController extends Controller
{
    public function follow($id){
        $follow = Follow::create([
            'user_id' => Auth::user()->id,
            'follow_id' => $id
        ]);

        return back();
    }

    public function unfollow($id){
        Follow::where('user_id', Auth::id())->where('follow_id', $id)->delete();
        
        return back();
    }

    public function following($id){
        $user = User::find($id);
        $follows = $user->following()->get();
        // dd($follows->first()->id);
        return view('follow', compact('follows', 'user'));
    }

    public function followers($id){
        $user = User::find($id);
        $follows = $user->followers()->get();
        return view('follow', compact('follows', 'user'));
    }

}
