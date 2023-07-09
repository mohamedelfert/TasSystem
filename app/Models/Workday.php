<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workday extends Model {

	protected $table = 'workdays';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('day', 'date', 'name_slot');

	public function slotTeachers()
	{
		return $this->hasMany('App\Models\SlotTeacher');
	}

    public function slot()
    {
        return $this->belongsTo(Slot::class, 'name_slot');
    }

}
