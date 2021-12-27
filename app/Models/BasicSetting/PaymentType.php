<?php

namespace App\Models\BasicSetting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class PaymentType extends Model
{
    use HasFactory;
    protected $table = "payment_type";
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    protected $fillable = [
        'payment_type'
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model['uuid']  = Uuid::uuid4()->toString();
            return $model;
        });
    }
}
