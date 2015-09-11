<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaCitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('area_cities', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('code');
			$table->string('name');
			$table->string('provincecode');
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
		Schema::drop('area_cities');
	}

}
