<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class OrderDetail extends Model
{
    use SoftDeletes;

    protected $table = 'order_details';
    public $timestamps = true;

    protected $dates = ['deleted_at'];
    protected $guarded = ['id'];

//    protected $fillable = array('order_id', 'date', 'slot_id', 'start_at', 'end_at', 'is_postponed');
    public function newTime()
    {
        return $this->hasOne(OrderDetail::class, 'postpone_id');
    }

    public function postponedTime()
    {
        return $this->belongsTo(OrderDetail::class, 'postpone_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function slot()
    {
        return $this->belongsTo(Slot::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
