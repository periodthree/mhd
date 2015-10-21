<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');

            $table->date('install_date');
            $table->string('first_name',255);
            $table->string('last_name',255);
            $table->string('email',255);
            $table->string('phone',50);
            $table->string('address',255);
            $table->string('address_2',255);

            $table->string('city',255);
            $table->string('state',255);
            $table->string('country',255);
            $table->string('zip',255);

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
		Schema::drop('users');
	}

}
