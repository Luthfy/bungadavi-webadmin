<?php

namespace App\Models\BasicSetting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryRemark extends Model
{
    use HasFactory;

    protected $table = "delivery_remark";
    protected $primaryKey = 'id';
    protected $keyType = 'integer';

    protected $fillable = [
        'description',
        'description_en',
        'is_active'
    ];

}
