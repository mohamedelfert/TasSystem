<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{

    protected $table = 'branches';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
//	protected $fillable = array('name', 'address', 'email', 'phone', 'status');
    protected $guarded = [];

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
