<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration {

	public function up()
	{
		Schema::create('pages', function(Blueprint $table) {
			$table->increments('id');
			$table->string('pName', 150);
			$table->string('pLink', 150);
			$table->text('content');
			$table->tinyInteger('type');
			$table->tinyInteger('active');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('pages');
	}
}