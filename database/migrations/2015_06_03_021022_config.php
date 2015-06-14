<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Config extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('configuration', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 30);
			$table->string('description', 60);
			$table->string('author');
			$table->string('facebook');
			$table->string('youtube');
			$table->string('twitter');
			$table->string('google');
			$table->integer('posts');
			$table->string('metakey');
			$table->string('theme');
		});

		Schema::table('configuration', function(Blueprint $table)
		{
			$table->foreign('author')->references('name')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('configuration');
	}

}
