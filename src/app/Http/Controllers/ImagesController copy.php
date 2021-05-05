<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use App\Images;
use Storage;
use Illuminate\Support\Facades\Validator;


class ImagesController extends Controller
{
	public function upload_aws(Request $request){

		//first arg of make: data for validation 
		//second arg of make: validatation rule
		$validator = Validator::make($request->all(), [
			'file' => 'required|max::10240|mimes:jepg,gif,png',
			'comment' => 'required|max:191'
		]);

		//in case of error, passing validation information to view
		if ($validator->fails()){
			return back()->withInput()->withErrors($validator);
		}

		//store in AWS S3
		//first: direcctory in s3
		//second: file
		//third: opening in public
		$file = $request->file('file');
		$path = Storage::disk('s3')->putFile('/',file,'public');

		//store path and title of images to columns
		Images::create([
			'image_file_name' => $path,
			'image_title'=> $request->comment
		]);

		return redirect('/');
	}

	function upload(Request $request){
		$request->validate([
			'image' => 'required|file|image|mimes:png,jpeg',
		]);

		$images = $request->file('image');

		if($images) {
			//saving uploaded image
			$path = $images->store('uploads',"public");
			//store in DB
			if($path){
				Images::create([
					"file_name" => $images->getClientOriginalName(),
					"file_path" => $path
				]);
			}
		}
		return redirect("/list");
	}
	function show(){
		return view("image_list");
	}

	public function index(){
		$images = \app\Images::all();
		$posts = \app\Images::all();
		$data = [
			'images' => $images,
		];

		#return view('welcome', ['images' => $posts]);
		return view('welcome', data);
	}


}
