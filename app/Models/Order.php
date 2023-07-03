<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Node\Expr\AssignOp\Mod;

class Order extends Model {

	protected $table = 'orders';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('final_price', 'coupon_name');

	public function branch()
	{
		return $this->belongsTo('App/Models\Branch');
	}

	public function fine()
	{
		return $this->morphMany('App\Models\Fine');
	}

}
