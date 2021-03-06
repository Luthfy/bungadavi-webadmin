<?php

namespace App\Models\Transaction;

use App\Models\Client\Florist;
use App\Models\Client\Personal;
use App\Models\Courier\CourierTask;
use Ramsey\Uuid\Uuid;
use App\Models\Transaction\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $table        = "order_transactions";
    protected $primaryKey   = 'uuid';
    protected $keyType      = 'string';

    public $incrementing = false;

    protected $fillable = [
        "code_order_transaction",
        "type_order_transaction",
        "total_order_transaction",
        "shipping_price_order_transaction",
        "status_order_transaction",
        "is_guest",
        "from_message_order",
        "to_message_order",
        'card_message_category',
        'card_message_subcategory',
        'card_message_message',
        "code_currency",
        "rates_currency"
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
     * Get the floristName that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function floristName()
    {
        return $this->belongsTo(Florist::class, 'florist_uuid', 'uuid')->first()->fullname ?? '-';
    }

    /**
     * Get all of the products for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'order_transactions_uuid', 'uuid');
    }

    public function sender_receiver()
    {
        return $this->hasMany(SenderReceiver::class, 'order_transactions_uuid', 'uuid');
    }

    public function delivery_schedule()
    {
        return $this->hasMany(Delivery::class, 'order_transactions_uuid', 'uuid');
    }

    public function courier_task()
    {
        return $this->hasMany(CourierTask::class, 'order_transactions_uuid', 'uuid');
    }
}
