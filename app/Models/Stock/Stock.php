<?php

namespace App\Models\Stock;

use App\Models\User;
use Ramsey\Uuid\Uuid;
use App\Models\Stock\Shop;
use App\Models\Stock\Split;
use App\Models\Stock\Opname;
use App\Models\BasicSetting\Unit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends Model
{
    use HasFactory, SoftDeletes;

    protected $table        = "stocks";
    protected $primaryKey   = 'uuid';
    protected $keyType      = 'string';
    protected $appends      = ['type'];

    public $incrementing = false;

    protected $fillable = [
        'name_stock',
        'type_stock',
        'qty_stock',
        'image_stock',
        'is_active',
        'unit_id',
        'user_uuid'
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y h:i:s',
        'updated_at' => 'datetime:d-m-Y h:i:s',
    ];

    public function getTypeAttribute()
    {
        switch ($this->type_stock) {
            case '0':
                return 'Reguler';
                break;

            case '1':
                return 'New';
                break;

            case '2':
                return 'Most Wanted';
                break;

            default:
                return 'undefined';
                break;
        }
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model['uuid']          = Uuid::uuid4()->toString();
            $model['code_stock']    = "STBD" . date('Ymdhis') . str_pad((self::get()->count()) + 1, 4, "0", STR_PAD_LEFT);
            $model['user_uuid']     = auth()->user()->uuid ?? null;
            return $model;
        });

        self::updating(function ($model) {
            $model['user_uuid'] = auth()->user()->uuid ?? null;
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
     * Get the unit that owns the Stock
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    /**
     * Get the split associated with the Stock
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function split($unitId)
    {
        return $this->hasMany(Split::class, 'stock_fraction_uuid')->where('unit_id', $unitId);
    }

    /**
     * Get the split associated with the Stock
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function splitByOriginal()
    {
        return $this->hasMany(Split::class, 'stock_original_uuid');
    }

    /**
     * Get all of the shops for the Stock
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shops()
    {
        return $this->hasMany(Shop::class, 'stocks_uuid', 'uuid');
    }

    /**
     * Get all of the opnames for the Stock
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function opnames()
    {
        return $this->hasMany(Opname::class, 'stocks_uuid', 'uuid');
    }
}
