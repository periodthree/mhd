<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstallersTabel extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('installers', function(Blueprint $table)
		{
			$table->increments('id');

            $table->string('business_name',255);
            $table->string('first_name',255);
            $table->string('last_name',255);
            $table->string('email',255);
            $table->string('phone',50);
            $table->string('alt_phone',50);
            $table->string('address',255);
            $table->string('address_2',255);

            $table->string('city',255);
            $table->string('state',255);
            $table->string('country',255);
            $table->string('zip',255);

            $table->string('website',255);
            $table->string('hvac_license',255);
            $table->string('liability_amount',255);

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
		Schema::drop('installers');
	}

}
