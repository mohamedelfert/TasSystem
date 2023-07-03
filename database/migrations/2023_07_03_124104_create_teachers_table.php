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
			$table->text('address');
			$table->enum('status', array('active', 'inactive'));
			$table->enum('work', array('yes', 'no'));
			$table->timestamps();
			$table->softDeletes();
			$table->bigInteger('country_id');
			$table->integer('language')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('teachers');
	}
}