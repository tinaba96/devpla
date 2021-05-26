<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use App\Images;
use Storage;
use Illuminate\Support\Facades\Validator;


class ImagesController extends Controller
{
<<<<<<< Updated upstream
<<<<<<< HEAD
=======

>>>>>>> 491dbf6c07bdbf9b543422a22ca247e2b2154f7f
=======

>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
<<<<<<< HEAD
	function show(){
		return view("image_list");
	}
=======
>>>>>>> 491dbf6c07bdbf9b543422a22ca247e2b2154f7f
=======
>>>>>>> Stashed changes

	public function index(){
		$images = \app\Images::all();
		$posts = \app\Images::all();
		$data = [
			'images' => $images,
		];

		#return view('welcome', ['images' => $posts]);
		return view('welcome', data);
	}


<<<<<<< Updated upstream
<<<<<<< HEAD
=======

>>>>>>> 491dbf6c07bdbf9b543422a22ca247e2b2154f7f
=======

>>>>>>> Stashed changes
}
