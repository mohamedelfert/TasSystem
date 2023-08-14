<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration
{

    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('app_order_id');
            $table->integer('teacher_id')->unsigned();
            $table->integer('branch_id')->unsigned();
            $table->integer('subject_id')->unsigned();
            $table->integer('count_order_details');
            $table->date('date');
            $table->datetime('finished_at')->nullable();
            $table->decimal('price');
            $table->decimal('final_price');
            $table->string('coupon_name')->nullable();
            $table->enum('status', ['accepted', 'cancelled', 'completed'])->default('accepted');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('orders');
    }
}
