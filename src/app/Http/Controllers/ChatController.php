<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use App\User;
use App\Chatgroup;
use App\User_chatgroup;
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

    public function home(){
        $groups = Chatgroup::all();
        return view('homechat', compact('groups'));
    }

    public function group_list(){

        return view('homechat');
    }

    public function store(Request $request){
       Chatgroup::create([
           'name' => $request->name
       ]);
        $groups = Chatgroup::all();
       return view('homechat', compact('groups'));
    }

    public function create(){
        return view('create_chatgroup');
    }

    public function chat(Chatgroup $chatgroup, Chat $chats){
        // dd($chatgroup->id);
        $members = User_chatgroup::where('chatgroup_id', $chatgroup->id)->get();
        // dd($members->count());
        $chats = Chat::all();
        foreach($members as $member){
            if(Auth::user()->id == $member->user_id){
                return view('chat', compact('chatgroup', 'chats', 'members'));
            }
        }
        return back()->with('error', 'あなたはメンバーではありません。');

    }

    public function members(Chatgroup $chatgroup){
        // $chatgroup = Chatgroup::all();
        // dd($chatgroup->id);

        $members = $chatgroup->user_chatgroup()->get();

        // dd($members->first()->users()->first()->name);

        // $mebers = User_chatgroup::where('chatgroup_id', '1')->first()->user_id;
        // dd(Auth::user()->user_chatgroup()->where('chatgroup_id', i1)->exists());
        // $users = User::find();
        return view('chatgroup_members', compact('chatgroup','members'));
    }

    public function bemember(Chatgroup $chatgroup){
       User_chatgroup::create([
           'user_id' => Auth::user()->id,
           'chatgroup_id' => $chatgroup->id
       ]);
        return back()->with('success', 'メンバーに追加されました。');
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
        return back();
        // return redirect();
    }

    public function getData()
    {
        $chats = Chat::orderBy('created_at', 'desc')->get();
        $json = ["chats" => $chats];
        return response()->json($json);
    }

}
