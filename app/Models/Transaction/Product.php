<?php

namespace App\Models\Transaction;

use Ramsey\Uuid\Uuid;
use App\Models\Transaction\Order;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction\ProductCustom;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Product\Product as ProductStock;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table        = "list_product_order_transactions";
    protected $primaryKey   = 'uuid';
    protected $keyType      = 'string';

    public $incrementing = false;

    protected $fillable = [
        'product_uuid',
        'order_transactions_uuid',
        'code_product',
        'name_product',
        'qty_product',
        'price_product',
        'remarks_product',
        'description_product',
        'status_product',
        'image_product'
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

    public function product()
    {
        return $this->belongsTo(ProductStock::class, 'product_uuid', 'uuid');
    }

    /**
     * Get the order that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_transactions_uuid', 'uuid');
    }

    /**
     * Get all of the materials for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materials()
    {
        return $this->hasMany(ProductCustom::class, 'list_product_uuid');
    }
}
