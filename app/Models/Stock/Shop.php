<?php

namespace App\Models\Stock;

use App\Models\User;
use Ramsey\Uuid\Uuid;
use App\Models\Product\Stock;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shop extends Model
{
    use HasFactory, SoftDeletes;

    protected $table        = "stocks_shop";
    protected $primaryKey   = 'uuid';
    protected $keyType      = 'string';

    public $incrementing = false;

    protected $fillable = [
        'total_price_stock_shop',
        'qty_stock_shop',
        'reject_stock_shop',
        'notes_stock_shop',
        'stocks_uuid'
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y h:i:s',
        'updated_at' => 'datetime:d-m-Y h:i:s',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model['uuid']      = Uuid::uuid4()->toString();
            $model['user_uuid'] = auth()->user()->uuid;
            return $model;
        });

        self::updating(function ($model) {
            $model['user_uuid'] = auth()->user()->uuid;
            return $model;
        });
    }

    /**
     * Get the user that owns the Stock
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_uuid', 'uuid');
    }

    /**
     * Get the stocks that owns the Shop
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function stocks()
    {
        return $this->belongsTo(Stock::class, 'stocks_uuid', 'uuid');
    }

}
