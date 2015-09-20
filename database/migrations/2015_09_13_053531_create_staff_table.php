<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('staffs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('industry_id');
			$table->integer('sub_industry_id');
			$table->string('industry_name');
			$table->integer('work_category_id');
			$table->integer('sub_work_category_id');
			$table->string('work_category_name');
			$table->datetime('start_at');
			$table->datetime('end_at');
			$table->string('province')->nullable();
			$table->string('city')->nullable();
			$table->string('street')->nullable();
			$table->string('area_name')->nullable();
			$table->boolean('flag')->default(false);
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
		Schema::drop('staffs');
	}

}
