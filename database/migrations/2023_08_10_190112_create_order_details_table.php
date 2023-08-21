<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderDetailsTable extends Migration {

	public function up()
	{
		Schema::create('order_details', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('app_detail_id');
            $table->integer('subject_id')->unsigned();
            $table->integer('slot_id')->unsigned();
            $table->date('date');
            $table->time('start_at');
            $table->time('end_at');
            $table->boolean('is_postponed')->default(0);
            $table->integer('postpone_id')->nullable();
            $table->enum('status', ['accepted', 'cancelled', 'completed'])->default('accepted');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('order_details');
	}
}
