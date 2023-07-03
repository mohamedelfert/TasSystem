<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SlotTeacher extends Model {

	protected $table = 'slot_teacher';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('teacher_id');

	public function teacher()
	{
		return $this->belongsTo('App\Models\Teacher');
	}

	public function workday()
	{
		return $this->belongsTo('App\Models\Workday');
	}

	public function slot()
	{
		return $this->belongsTo('App\Models\Slot');
	}

	public function fine()
	{
		return $this->morphMany('App\Models\Fine');
	}

}
