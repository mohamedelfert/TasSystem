<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBranchesTable extends Migration {

	public function up()
	{
		Schema::create('branches', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->text('address');
			$table->string('email')->nullable();
			$table->string('phone')->unique();
			$table->enum('status', array('open', 'close'));
			$table->integer('country_id');
			$table->decimal('lat', 10,7);
			$table->decimal('lng', 10,7);
            $table->timestamps();
            $table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('branches');
	}
}
