<?php

namespace App\Models\BasicSetting;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $table = "promotion";
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    protected $fillable = [
        'title',
        'title_en',
        'image',
        'description',
        'description_en',
        'tnc',
        'tnc_en',
        'promotion_code',
        'is_active',
        'promo_start_date',
        'promo_end_date',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model['uuid']  = Uuid::uuid4()->toString();
            return $model;
        });
    }

    public function hasDiscount()
    {
        return $this->hasMany(Discount::class, 'promo_uuid', 'uuid');
    }

}
