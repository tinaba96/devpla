<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->bigIncrements('id');
<<<<<<< HEAD
	    $table->unsignedBigInteger('user_id')->unsigned();
	    $table->unsignedBigInteger('post_id')->unsigned();
=======
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('post_id')->unsigned();
>>>>>>> 491dbf6c07bdbf9b543422a22ca247e2b2154f7f

            $table->timestamps();

	    $table->foreign('user_id')
		   ->references('id')
		   ->on('users')
		   ->onDelete('cascade');

	    $table->foreign('post_id')
		   ->references('id')
		   ->on('posts')
		   ->onDelete('cascade');

	    $table->unique(['user_id', 'post_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
