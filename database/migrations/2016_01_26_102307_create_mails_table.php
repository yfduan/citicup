<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mails', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('from_id')->unsigned();
			$table->foreign('from_id')->references('id')->on('teams');
			$table->integer('to_id')->unsigned();
			$table->foreign('to_id')->references('id')->on('teams');
			$table->boolean('flag_read');
			$table->boolean('del_s');
			$table->boolean('del_r');
			$table->string('uid')->unique();
			$table->timestamps();
			$table->string('subject');
			$table->string('content');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mails');
	}

}
