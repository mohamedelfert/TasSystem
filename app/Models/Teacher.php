<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Teacher extends Authenticatable
{
    use Notifiable;

    protected $table = 'teachers';
    public $timestamps = true;

    use SoftDeletes;

    protected $guard = 'teacher';

    protected $dates = ['deleted_at'];
//    protected $fillable = array('first_name', 'last_name', 'email', 'phone', 'password', 'address', 'status', 'work');
    protected $guarded = [];

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

    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getLastNameAttribute($value)
    {
        return ucfirst($value);
    }

}
