<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use HasTranslations, SoftDeletes;

    public $translatable = ['name'];

    protected $table = 'countries';
    protected $guarded = [];

    public $timestamps = true;
    protected $dates = ['deleted_at'];

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }

}
