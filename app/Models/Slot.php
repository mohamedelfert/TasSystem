<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slot extends Model
{

    protected $table = 'slots';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('start_at', 'end_at');

    public function slotTeachers()
    {
        return $this->hasMany(SlotTeacher::class);
    }

}
