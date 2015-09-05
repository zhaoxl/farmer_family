<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('category');
			$table->string('name');
			$table->string('mobile');
			$table->string('qq')->nullable();
			$table->string('weixin')->nullable();
			$table->boolean('public_mobile')->default(false);
			$table->boolean('public_qq')->default(false);
			$table->boolean('public_weixin')->default(false);
			$table->boolean('public_email')->default(false);
			$table->string('gender')->nullable();
			$table->string('age')->nullable();
			$table->string('hometown')->nullable();
			$table->string('idcard');
			$table->string('expect_salary')->nullable();
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->string('province')->nullable();
			$table->string('city')->nullable();
			$table->string('street')->nullable();
			$table->string('area_name')->nullable();
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
