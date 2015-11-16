<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffEvaluatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('staff_evaluates', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('staff_id');
			$table->integer('user_id');
			$table->integer('star')->default(0);
			$table->string('content')->nullable();
			$table->string('ip')->nullable();
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
		Schema::drop('staff_evaluates');
	}

}
