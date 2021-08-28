<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCmntsTable extends Migration {

	public function up()
	{
		Schema::create('cmnts', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('del_user');
			$table->integer('post_id');
			$table->text('body');
			$table->tinyInteger('active');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('cmnts');
	}
}