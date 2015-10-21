<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToInstallers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('installers', function(Blueprint $table)
		{
			$table->string('schedule_phone',50);
            $table->string('territory');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('installers', function(Blueprint $table)
		{
			//
		});
	}

}
