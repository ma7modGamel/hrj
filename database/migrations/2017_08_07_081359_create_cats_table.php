<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCatsTable extends Migration {

	public function up()
	{
		Schema::create('cats', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('parent_id');
			$table->string('name', 100);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('cats');
	}
}