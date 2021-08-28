<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->index();
			$table->integer('del_user')->default('0');
			$table->integer('cat_id');
			$table->integer('brand');
			$table->integer('model');
			$table->integer('area_id');
			$table->string('title', 300);
			$table->text('body');
			$table->decimal('lat');
			$table->decimal('lng');
			$table->text('image');
			$table->text('contact');
			$table->tinyInteger('top');
			$table->tinyInteger('closed');
			$table->timestamps();
            $table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
}