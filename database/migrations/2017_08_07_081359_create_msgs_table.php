<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMsgsTable extends Migration {

	public function up()
	{
		Schema::create('msgs', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('user_to');
			$table->text('body');
			$table->tinyInteger('status');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('msgs');
	}
}