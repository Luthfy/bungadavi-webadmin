<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class Receipt extends Model
{
    use HasFactory, SoftDeletes;

    protected $table        = "delivery_receipt_order";
    protected $primaryKey   = 'uuid';
    protected $keyType      = 'string';

    public $incrementing = false;

    protected $fillable = [
        'order_transactions_uuid',
        'delivery_schedule_uuid',
        'sender_receiver_uuid',
        'delivery_assign_uuid',
        'user_uuid',
        'courier_uuid',
        'photo_delivery_receipt',
        'recipient_receipt',
        'status_receipt',
        'notes_receipt',
        'fee_receipt',
        'reward_receipt',
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y h:i:s',
        'updated_at' => 'datetime:d-m-Y h:i:s',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model['uuid'] = Uuid::uuid4()->toString();
            return $model;
        });
    }
}
