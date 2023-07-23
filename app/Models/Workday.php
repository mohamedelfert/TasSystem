<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Workday extends Model
{
    use HasTranslations;

    public $translatable = ['day'];

    protected $table = 'workdays';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('day');

    public function slotTeachers()
    {
        return $this->hasMany(SlotTeacher::class);
    }

    public function slot()
    {
        return $this->belongsTo(Slot::class, 'name_slot');
    }

}
