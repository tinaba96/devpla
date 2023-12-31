<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('role')->nullable();
            $table->string('profile_image')->default(' https://snowman-1.s3.ap-northeast-1.amazonaws.com/devpla/default.png');
            $table->string('my_skills', 2048)->nullable();
            $table->string('topics_interest', 2048)->nullable();
            $table->string('edu_background', 2048)->nullable();
            $table->string('work_history', 2048)->nullable();
            $table->string('achieve_quali', 2048)->nullable();
            $table->dateTime('last_login_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}