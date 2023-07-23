<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    protected $table = 'countries';
    public $timestamps = true;
    protected $guarded = [];

    use SoftDeletes;

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
