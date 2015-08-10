<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminOperationLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admin_operation_logs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('admin_id');
			$table->string('model_name');
			$table->string('action');
			$table->string('remark');
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
		Schema::drop('admin_operation_logs');
	}

}
