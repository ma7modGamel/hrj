<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactsTable extends Migration {

	public function up()
	{
		Schema::create('contacts', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 100);
			$table->string('email', 150);
			$table->string('phone', 20);
			$table->string('subject', 255);
			$table->tinyInteger('type');
			$table->text('body');
			$table->string('image', 150);
			$table->integer('user_id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('contacts');
	}
}