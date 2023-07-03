<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSystemTeacherTable extends Migration {

	public function up()
	{
		Schema::create('system_teacher', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->bigInteger('system_id');
			$table->bigInteger('teacher_id');
		});
	}

	public function down()
	{
		Schema::drop('system_teacher');
	}
}