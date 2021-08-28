<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRatingsTable extends Migration {

	public function up()
	{
		Schema::create('ratings', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('rate_id');
			$table->tinyInteger('type');
			$table->text('content');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('ratings');
	}
}