<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EditSlotsPay extends Model
{
    use HasFactory;

    protected $table = 'edit_slots_pays';
    protected $guarded = ['id'];
}
