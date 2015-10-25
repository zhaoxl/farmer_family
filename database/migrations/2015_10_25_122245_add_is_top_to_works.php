<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsTopToWorks extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('works', function(Blueprint $table)
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
		Schema::table('works', function(Blueprint $table)
		{
			$table->dropColumn("is_top");
		});
	}

}
