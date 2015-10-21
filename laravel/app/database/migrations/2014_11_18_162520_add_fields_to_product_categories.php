<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToProductCategories extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('product_categories', function(Blueprint $table)
		{
			//
            $table->integer('short_description')->before('created_at');
            $table->text('long_description')->before('created_at');
            $table->text('warranty_icon')->before('created_at');
            $table->text('warranty_pdf')->before('created_at');
            $table->text('brochure_pdf')->before('created_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('product_categories', function(Blueprint $table)
		{
			//
		});
	}

}
