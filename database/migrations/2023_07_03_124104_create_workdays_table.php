<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkdaysTable extends Migration {

	public function up()
	{
		Schema::create('workdays', function(Blueprint $table) {
			$table->increments('id');
			$table->string('day');
			$table->datetime('date');
			$table->string('name_slot');
			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('workdays');
	}
}
