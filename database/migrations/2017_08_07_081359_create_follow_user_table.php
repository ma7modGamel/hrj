<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFollowUserTable extends Migration {

	public function up()
	{
		Schema::create('follow_user', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('user_follow');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('follow_user');
	}
}