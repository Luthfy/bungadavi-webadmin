<?php

namespace App\Models\Transaction;

use Ramsey\Uuid\Uuid;
use App\Models\Courier\Courier;
use App\Models\Courier\CourierTask;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory, SoftDeletes;

    protected $table        = "delivery_schedule_order";
    protected $primaryKey   = 'uuid';
    protected $keyType      = 'string';

    public $incrementing = false;

    protected $fillable = [
        'uuid',
        'order_transactions_uuid',
        'sender_receiver_uuid',
        'delivery_date',
        'delivery_charge',
        'time_slot_name',
        'time_slot_charge',
        'time_slot_id',
        'delivery_remarks',
        'internal_notes',
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

    /**
     * Get all of the products for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_transactions_uuid', 'uuid');
    }

    /**
     * Get all of the products for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function senderRecipient()
    {
        return $this->belongsTo(SenderReceiver::class, 'sender_receiver_uuid', 'uuid');
    }

    /**
     * Get all of the couriers for the Schedule
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courierTask()
    {
        return $this->hasMany(CourierTask::class, 'delivery_schedule_uuid', 'uuid');
    }
}
