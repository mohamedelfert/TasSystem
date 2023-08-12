<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBranchTeacherTable extends Migration {

	public function up()
	{
		Schema::create('branch_teacher', function(Blueprint $table) {
			$table->increments('id');
            $table->integer('branch_id')->unsigned();
            $table->integer('teacher_id')->unsigned();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('branch_teacher');
	}
}
