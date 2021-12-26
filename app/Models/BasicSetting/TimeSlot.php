<?php

namespace App\Models\BasicSetting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    use HasFactory;
    protected $table = "time_slot";
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    protected $fillable = [
        'time_slot_name',
        'time_from',
        'time_to',
        'price',
        'description',
        'city_available',
        'is_priority',
        'is_active'
    ];
}
