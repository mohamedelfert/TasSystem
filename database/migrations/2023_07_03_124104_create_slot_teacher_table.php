<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSlotTeacherTable extends Migration {

	public function up()
	{
		Schema::create('slot_teacher', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('slot_id')->unsigned();
			$table->integer('workday_id')->unsigned();
			$table->string('teacher_id');
		});
	}

	public function down()
	{
		Schema::drop('slot_teacher');
	}
}