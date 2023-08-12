<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSystemTeacherTable extends Migration {

	public function up()
	{
		Schema::create('system_teacher', function(Blueprint $table) {
			$table->increments('id');
            $table->integer('system_id');
            $table->integer('teacher_id');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('system_teacher');
	}
}
