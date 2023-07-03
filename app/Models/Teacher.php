<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model {

	protected $table = 'teachers';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('first_name', 'last_name', 'email', 'phone', 'password', 'address', 'status', 'work');

	public function subjects()
	{
		return $this->belongsToMany('Subject', 'subject_teacher', 'subject_id', 'teacher_id');
	}

	public function branchs()
	{
		return $this->belongsToMany('Branch', 'branch_teacher', 'branch_id', 'teacher_id');
	}

	public function fines()
	{
		return $this->hasMany('Fine');
	}

	public function country()
	{
		return $this->belongsTo('App\Models\Country');
	}

	public function slotTeachers()
	{
		return $this->hasMany('App\Models\SlotTeacher');
	}

	public function systems()
	{
		return $this->belongsToMany('App\Models\System');
	}

}
