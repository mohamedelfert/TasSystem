<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model {

	protected $table = 'branches';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('name', 'address', 'email', 'phone', 'status');

	public function teachers()
	{
		return $this->belongsToMany('Teacher');
	}

	public function country()
	{
		return $this->belongsTo('App\Models\Country');
	}

	public function orders()
	{
		return $this->hasMany('App\Models\Order');
	}

}
