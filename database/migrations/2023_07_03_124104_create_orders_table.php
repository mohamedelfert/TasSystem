<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->bigInteger('order_id');
			$table->bigInteger('subject_id');
			$table->date('date');
			$table->bigInteger('slot_id');
			$table->bigInteger('teacher_id')->nullable();
			$table->bigInteger('branch_id');
			$table->datetime('finished_at')->nullable();
			$table->decimal('price');
			$table->decimal('final_price');
			$table->string('coupon_name')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('orders');
	}
}