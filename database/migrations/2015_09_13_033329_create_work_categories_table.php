<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('work_categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('up_id');
			$table->string('category_name');
			$table->string('full_name');
			$table->integer('sort')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('work_categories');
	}

}
