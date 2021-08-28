<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAreasTable extends Migration {

	public function up()
	{
		Schema::create('areas', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('parent_id');
			$table->string('name', 100);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('areas');
	}
}