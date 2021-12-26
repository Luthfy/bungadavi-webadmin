<?php

namespace App\Models\BasicSetting;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $table = "discount";
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    protected $fillable = [
        'promo_uuid',
        'title',
        'title_en',
        'description',
        'description_en',
        'voucher_code',
        'voucher_start_date',
        'voucher_end_date',
        'discount_type',
        'discount_value',
        'discount_max',
        'minbill',
        'is_used',
        'quota',
        'payment_category',
        'payment_type_id',
        'is_active',
        'tnc',
        'tnc_en',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model['uuid']  = Uuid::uuid4()->toString();
            return $model;
        });
    }

    public function promotion()
    {
        return $this->belongsTo(Promotion::class, 'promo_uuid', 'uuid');
    }
}
