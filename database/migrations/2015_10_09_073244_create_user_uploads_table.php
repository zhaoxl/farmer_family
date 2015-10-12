<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserUploadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_uploads', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('session_id');
			$table->integer('user_id')->nullable();
			$table->string('category');
			$table->string('item_type')->nullable();
			$table->integer('item_id')->nullable();
			$table->string('url');
			$table->string('file_type');
			$table->string('file_size');
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
		Schema::drop('user_uploads');
	}

}
