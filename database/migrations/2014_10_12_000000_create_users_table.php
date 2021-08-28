<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 200);
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone', 20);
            $table->text('rank');
            $table->tinyInteger('men');
            $table->tinyInteger('type');
            $table->tinyInteger('active');
            $table->string('active_mail', 30);
            $table->string('notf', 20);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
