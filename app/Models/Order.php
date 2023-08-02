<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Node\Expr\AssignOp\Mod;

class Order extends Model
{
    use SoftDeletes;

    protected $table = 'orders';
    protected $guarded = [];
    //    protected $fillable = array('final_price', 'coupon_name');

    public $timestamps = true;
    protected $dates = ['deleted_at'];

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
