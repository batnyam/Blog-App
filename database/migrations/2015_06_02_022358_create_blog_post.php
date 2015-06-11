<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogPost extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post', function(Blueprint $table){
			$table->increments('id');
			$table->integer('Status');
			$table->string('Category', 30);
			$table->string('Title', 30);
			$table->longText('Content');
			$table->string('Author', 30);
			$table->timestamp('created_at');
			$table->timestamp('updated_at');
			$table->string('tag', 30);
			$table->string('metakey');
			$table->integer('excerpt');
		});

		Schema::table('post', function(Blueprint $table){
			$table->foreign('Author')->references('name')->on('users');
			$table->foreign('Category')->references('name')->on('category');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('post');
	}

}
