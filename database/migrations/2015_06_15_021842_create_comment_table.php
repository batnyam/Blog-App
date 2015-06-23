<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comment', function(Blueprint $table){
			$table->increments('id');
			$table->integer('post_id')->unsigned();
			$table->string('author_name', 60);
			$table->string('author_email', 60);
			$table->string('author_ip', 60);
			$table->text('comment');
			$table->timestamps('created_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comment');
	}

}
