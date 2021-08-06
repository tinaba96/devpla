<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Storage;
use App\User;
use Storage;
use Image;
use InterventionImage;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function users(){

        $users = User::all();

        // dd($users->count());

        return view('users', compact('users'));
    }

    public function user(User $user){
        
        return view('user', compact('user'));
    }


    public function show(){

        $users = Auth::user();

        // dd($users->id);

        return view('mypage', compact('users'));

    }

    public function edit(){


        $users = Auth::user();
        return view('edit_mypage', compact('users'));
    }

    public function update(Request $requests){

        Auth::user()->update([
            'my_skills' => $requests->my_skills,
            'topics_interest' => $requests->topics_interest,
            'edu_background' => $requests->edu_background,
            'work_history' => $requests->work_history,
            'achieve_quali' => $requests->achieve_quali,
        ]);
        $users = Auth::user();
        
        return view('mypage', compact('users'));
    }

    public function edit_image() {
        $user = Auth::user();

        return view('edit_mypage_image', compact('user'));
    }

    public function update_image($id, Request $request) {
        $user = Auth::user();
        $form = $request->all();



        if ($request->file('profile_image')){
            $request->validate([
                'profile_image' => 'required|file|image|mimes:png,jpeg',
            ]);
    
            $profileImage = $request->file('profile_image');

            if ($profileImage != null) {
                // // get instance
                // $img = Image::make($profileImage);
                // // resize
                // $img->fit(100, 100, function($constraint){
                //     $constraint->upsize(); 
                // });

                // $img = InterventionImage::make($profileImage)->resize(100, null, function ($constraint) {$constraint->aspectRatio();})->encode('jpg',80);



                // バケットの`myprefix`フォルダへアップロード
                $path = Storage::disk('s3')->putFile('devpla', $profileImage, 'public');
                // アップロードした画像のフルパスを取得
                $user->profile_image = Storage::disk('s3')->url($path);
                // $user->update([
                //     'profile_image' => Storage::disk('s3')->url($path)
                // ]);
            }

        }


        // if ($profileImage != null) {
        //     $form['profile_image'] = $this->saveProfileImage($profileImage, $id); // return file name
        // }

        // unset($form['_token']);
        // unset($form['_method']);
        $user->save();
        // return redirect('/mypage');
        return view('mypage');
    }

    private function saveProfileImage($image, $id) {
        // get instance
        $img = \Image::make($image);
        // resize
        $img->fit(100, 100, function($constraint){
            $constraint->upsize(); 
        });
        // // save
        // $file_name = 'profile_'.$id.'.'.$image->getClientOriginalExtension();
        // $save_path = 'public/profiles/'.$file_name;
        // Storage::put($save_path, (string) $img->encode());


        // バケットの`myprefix`フォルダへアップロード
        $path = Storage::disk('s3')->putFile('devpla', $img, 'public');
        // アップロードした画像のフルパスを取得
        $img_path = Storage::disk('s3')->url($path);

        // return file name
        return $img_path;
    }

}
