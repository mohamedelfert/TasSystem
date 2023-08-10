<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SlotTeacher extends Model
{
    protected $table = 'slot_teacher';
    protected $guarded = ['id'];
//    protected $fillable = array('slot_id', 'workday_id', 'teacher_id');

    public $timestamps = true;

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function workday()
    {
        return $this->belongsTo(Workday::class);
    }

    public function slot()
    {
        return $this->belongsTo(Slot::class);
    }

    public function fines()
    {
        return $this->morphMany(Fine::class, 'model');
    }

}
