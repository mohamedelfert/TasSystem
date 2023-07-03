<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class System extends Model {

	protected $table = 'systems';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('name');

	public function subjects()
	{
		return $this->hasMany('App/Models\Subject');
	}

	public function teachers()
	{
		return $this->belongsToMany('App\Models\Teacher');
	}

}
