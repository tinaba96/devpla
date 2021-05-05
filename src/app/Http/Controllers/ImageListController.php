<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Images;

class ImageListController extends Controller
{
    function show(){
		//アップロードした画像を取得
		$uploads = Images::orderBy("id", "desc")->get();

		return view("image_list",[
			"images" => $uploads
		]);
	}
}

