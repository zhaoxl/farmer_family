<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaStreetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('area_streets', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('code');
			$table->string('name');
			$table->string('citycode');
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
		Schema::drop('area_streets');
	}

}
