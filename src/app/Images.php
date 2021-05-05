<?php

namespace App;

#use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
	#use Factory;

	protected $table = "images";
	protected $fillable = [
		'file_name', 'file_path'
	];
}
