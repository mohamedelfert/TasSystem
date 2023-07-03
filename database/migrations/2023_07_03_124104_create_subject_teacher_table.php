<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubjectTeacherTable extends Migration {

	public function up()
	{
		Schema::create('subject_teacher', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('subject_id')->unsigned();
			$table->integer('teacher_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('subject_teacher');
	}
}