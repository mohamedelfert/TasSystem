<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SlotTeacher extends Model
{

    protected $table = 'slot_teacher';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
//    protected $fillable = array('slot_id', 'workday_id', 'teacher_id');

    protected $guarded = ['id'];

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
