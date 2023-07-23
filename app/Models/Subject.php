<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Subject extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    protected $table = 'subjects';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name', 'system_id');

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function system()
    {
        return $this->belongsTo(System::class);
    }

}
