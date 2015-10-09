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
			$table->integer('user_id');
			$table->string('category');
			$table->string('item_type');
			$table->integer('item_id');
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
