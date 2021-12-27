<?php

namespace App\Models\Stock;

use App\Models\User;
use Ramsey\Uuid\Uuid;
use App\Models\Product\Stock;
use App\Models\BasicSetting\Unit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Split extends Model
{
    use HasFactory, SoftDeletes;

    protected $table        = "stocks_split";
    protected $primaryKey   = 'uuid';
    protected $keyType      = 'string';

    public $incrementing = false;

    protected $fillable = [
        'stock_original_uuid',
        'stock_fraction_uuid',
        'unit_id',
        'notes_stock_split',
        'qty_stock_split'
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
    public function stocks($str)
    {
        return $this->belongsTo(Stock::class, $str, 'uuid');
    }

    /**
     * Get the unit that owns the Split
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
}
