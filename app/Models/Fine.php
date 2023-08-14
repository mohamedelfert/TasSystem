<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fine extends Model
{
    use SoftDeletes;

    protected $table = 'fines';
    protected $guarded = ['id'];
    //    protected $fillable = array('price');

    public $timestamps = true;
    protected $dates = ['deleted_at'];

    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function fineType()
    {
        return $this->belongsTo(FineType::class);
    }

    public function model()
    {
        return $this->morphTo();
    }

}
