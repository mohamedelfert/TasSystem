<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFinesTable extends Migration {

	public function up()
	{
		Schema::create('fines', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('payment_method_id')->unsigned();
			$table->integer('teacher_id')->unsigned();
			$table->decimal('price', 8,2);
			$table->morphs('model');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('fines');
	}
}