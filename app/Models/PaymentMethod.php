<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class PaymentMethod extends Model
{
    use HasTranslations, SoftDeletes;

    public $translatable = ['name'];

    protected $table = 'payment_methods';
    protected $guarded = [];
//    protected $fillable = array('name');

    public $timestamps = true;
    protected $dates = ['deleted_at'];

    public function fines()
    {
        return $this->hasMany(Fine::class);
    }

}
