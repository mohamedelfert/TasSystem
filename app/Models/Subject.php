<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{

    protected $table = 'subjects';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name', 'price', 'system_id');

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function system()
    {
        return $this->belongsTo(System::class);
    }

}
