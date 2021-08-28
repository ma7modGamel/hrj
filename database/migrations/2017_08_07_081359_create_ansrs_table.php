<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnsrsTable extends Migration {

	public function up()
	{
		Schema::create('ansrs', function(Blueprint $table) {
			$table->increments('id');
			$table->text('qshn');
			$table->text('ansr');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('ansrs');
	}
}