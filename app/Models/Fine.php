<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fine extends Model {

	protected $table = 'fines';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('price');

	public function payment_method()
	{
		return $this->belongsTo(PaymentMethod::class);
	}

	public function teacher()
	{
		return $this->belongsTo('Teacher');
	}

	public function model()
	{
		return $this->morphTo();
	}

}
