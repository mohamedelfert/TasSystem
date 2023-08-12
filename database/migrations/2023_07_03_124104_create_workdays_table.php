<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkdaysTable extends Migration {

	public function up()
	{
		Schema::create('workdays', function(Blueprint $table) {
			$table->increments('id');
			$table->string('day');
            $table->timestamps();
            $table->softDeletes();
        });
	}

	public function down()
	{
		Schema::drop('workdays');
	}
}
