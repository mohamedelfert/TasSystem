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

    protected $appends = ['image_path'];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'subject_teacher', 'subject_id', 'teacher_id');
    }

    public function branchs()
    {
        return $this->belongsToMany(Branch::class, 'branch_teacher', 'branch_id', 'teacher_id');
    }

    public function fines()
    {
        return $this->hasMany(Fine::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function slotTeachers()
    {
        return $this->hasMany(SlotTeacher::class);
    }

    public function systems()
    {
        return $this->belongsToMany(System::class);
    }

    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getLastNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getImagePathAttribute()
    {
        return asset('/uploads/teachers_images/' . $this->image);
    }

}
