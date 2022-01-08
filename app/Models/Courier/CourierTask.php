<?php

namespace App\Models\Courier;

use App\Models\Client\Personal;
use App\Models\Transaction\Delivery;
use App\Models\Transaction\Order;
use App\Models\Transaction\Schedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourierTask extends Model
{
    use HasFactory, SoftDeletes;

    protected $table        = "delivery_assign_order";
    protected $primaryKey   = 'uuid';
    protected $keyType      = 'string';

    public $incrementing = false;

    protected $fillable = [
        "order_transactions_uuid",
        "delivery_schedule_uuid",
        "user_uuid",
        "courier_uuid",
        "delivery_number_assignment",
        "status_assignment",
        "notes_assigment",
        'browse_image',
        'image_pickup',
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
            $model['delivery_number_assignment']  = "DN" . date('ymdhis') . str_pad((self::get()->count()) + 1, 4, "0", STR_PAD_LEFT);
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

    public function delivery()
    {
        return $this->belongsTo(Delivery::class, 'delivery_schedule_uuid', 'uuid');
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'delivery_schedule_uuid', 'uuid');
    }

    public function user()
    {
        return $this->belongsTo(Personal::class, 'user_uuid', 'uuid');
    }

    public function courier()
    {
        return $this->belongsTo(Courier::class, 'courier_uuid', 'uuid');
    }
}
