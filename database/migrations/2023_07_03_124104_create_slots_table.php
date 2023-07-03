<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSlotsTable extends Migration {

	public function up()
	{
		Schema::create('slots', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->time('start_at');
			$table->time('end_at');
			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('slots');
	}
}