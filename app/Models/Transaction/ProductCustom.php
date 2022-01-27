<?php

namespace App\Models\Transaction;

use Ramsey\Uuid\Uuid;
use App\Models\Stock\Stock;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCustom extends Model
{
    use HasFactory, SoftDeletes;

    protected $table        = "custom_product_order_transactions";
    protected $primaryKey   = 'uuid';
    protected $keyType      = 'string';

    public $incrementing = false;

    protected $fillable = [
        'list_product_uuid',
        'products_material_uuid',
        'name_stock',
        'qty_stock',
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
     * Get the stock that owns the ProductCustom
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function stock()
    {
        return $this->belongsTo(Stock::class, 'products_material_uuid', 'uuid');
    }
}
