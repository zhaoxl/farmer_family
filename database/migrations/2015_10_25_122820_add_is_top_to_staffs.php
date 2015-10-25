<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsTopToStaffs extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('staffs', function(Blueprint $table)
		{
			$table->boolean("is_top")->default(false)->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('staffs', function(Blueprint $table)
		{
			$table->dropColumn("is_top");
		});
	}

}
