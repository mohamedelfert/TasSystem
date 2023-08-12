<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeachersTable extends Migration {

	public function up()
	{
		Schema::create('teachers', function(Blueprint $table) {
			$table->increments('id');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('email')->unique();
			$table->string('phone')->unique();
			$table->string('password');
			$table->text('address')->nullable();
			$table->enum('status', array('active', 'inactive'))->default('inactive');
			$table->enum('work', array('yes', 'no'))->default('no');
			$table->integer('country_id')->nullable();
			$table->string('language')->nullable();
            $table->timestamps();
            $table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('teachers');
	}
}
