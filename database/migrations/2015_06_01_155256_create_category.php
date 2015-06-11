<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategory extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Category', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 30)->unique();
			$table->string('description', 60);
			$table->integer('menu');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Category');
	}

}
