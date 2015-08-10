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
			$table->string('qq');
			$table->string('weixin');
			$table->string('gender');
			$table->string('age');
			$table->string('hometown');
			$table->string('idcard');
			$table->string('expect_salary');
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->string('area_code');
			$table->string('area_name');
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
