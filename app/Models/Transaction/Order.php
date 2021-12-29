<?php

namespace App\Models\Transaction;

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
        "currency_id",
        "is_guest",
        'card_message_category',
        'card_message_subcategory',
        'card_message_message'
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
    public function products()
    {
        return $this->hasMany(Product::class, 'order_transactions_uuid', 'uuid');
    }
}
