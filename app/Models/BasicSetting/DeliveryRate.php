<?php

namespace App\Models\BasicSetting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeliveryRate extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "delivery_rate";

    protected $fillable = [
        'uuid',
        'name_rates',
        'village_origin_uuid',
        'village_destination_uuid',
        'type_rates',
        'price_rates',
        'unit_rates',
        'currency_type',
        'is_active',
    ];
}
