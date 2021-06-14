<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Create a new controller instance
     * 
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * show the application dashbord
     * 
     * return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $chats = Chat::get();
        return view('chat', ['chats' => $chats]);
    }


    public function add(Request $request){
        $user = Auth::user();
        $chat = $request->input('chat');
        Chat::create([
            'login_id' => $user->id,
            'name' => $user->name,
            'chat' => $chat
        ]);
        return redirect()->route('chat');
    }

    public function getData()
    {
        $chats = Chat::orderBy('created_at', 'desc')->get();
        $json = ["chats" => $chats];
        return response()->json($json);
    }

}
