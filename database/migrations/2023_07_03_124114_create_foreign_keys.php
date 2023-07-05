<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('subject_teacher', function(Blueprint $table) {
			$table->foreign('subject_id')->references('id')->on('subjects')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('subject_teacher', function(Blueprint $table) {
			$table->foreign('teacher_id')->references('id')->on('teachers')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('branch_teacher', function(Blueprint $table) {
			$table->foreign('branch_id')->references('id')->on('branches')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('branch_teacher', function(Blueprint $table) {
			$table->foreign('teacher_id')->references('id')->on('teachers')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('slot_teacher', function(Blueprint $table) {
			$table->foreign('slot_id')->references('id')->on('slots')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('slot_teacher', function(Blueprint $table) {
			$table->foreign('workday_id')->references('id')->on('workdays')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('fines', function(Blueprint $table) {
			$table->foreign('payment_method_id')->references('id')->on('payment_methods')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('fines', function(Blueprint $table) {
			$table->foreign('teacher_id')->references('id')->on('teachers')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('subject_teacher', function(Blueprint $table) {
			$table->dropForeign('subject_teacher_subject_id_foreign');
		});
		Schema::table('subject_teacher', function(Blueprint $table) {
			$table->dropForeign('subject_teacher_teacher_id_foreign');
		});
		Schema::table('branch_teacher', function(Blueprint $table) {
			$table->dropForeign('branch_teacher_branch_id_foreign');
		});
		Schema::table('branch_teacher', function(Blueprint $table) {
			$table->dropForeign('branch_teacher_teacher_id_foreign');
		});
		Schema::table('slot_teacher', function(Blueprint $table) {
			$table->dropForeign('slot_teacher_slot_id_foreign');
		});
		Schema::table('slot_teacher', function(Blueprint $table) {
			$table->dropForeign('slot_teacher_workday_id_foreign');
		});
		Schema::table('fines', function(Blueprint $table) {
			$table->dropForeign('fines_payment_method_id_foreign');
		});
		Schema::table('fines', function(Blueprint $table) {
			$table->dropForeign('fines_teacher_id_foreign');
		});
	}
}