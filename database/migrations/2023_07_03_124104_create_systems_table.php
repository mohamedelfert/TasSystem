<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSystemsTable extends Migration {

	public function up()
	{
		Schema::create('systems', function(Blueprint $table) {
			$table->increments('id');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('systems');
	}
}
