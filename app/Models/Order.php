<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Node\Expr\AssignOp\Mod;

class Order extends Model
{

    protected $table = 'orders';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
//    protected $fillable = array('final_price', 'coupon_name');
    Protected $guarded = [];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function slot()
    {
        return $this->belongsTo(Slot::class);
    }

    public function fines()
    {
        return $this->morphMany(Fine::class, 'model');
    }

}
