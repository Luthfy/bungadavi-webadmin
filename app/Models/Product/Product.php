<?php

namespace App\Models\Product;

use App\Models\User;
use Ramsey\Uuid\Uuid;
use App\Models\Product\Material;
use App\Models\Product\Reference;
use App\Models\Product\ProductColor;
use App\Models\Product\ProductCategory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product\ProductSubCategory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table        = "products";
    protected $primaryKey   = 'uuid';
    protected $keyType      = 'string';

    public $incrementing = false;

    protected $fillable = [
        'code_product',
        'name_product',
        'short_description_product',
        'short_description_en_product',
        'description_product',
        'description_en_product',
        'currency_uuid',
        'cost_product',
        'florist_cost_product',
        'selling_price_product',
        'selling_florist_price_product',
        'status_product',
        'mostwanted_product',
        'popularity_product',
        'seen_product',
        'image_main_product',
        'images_product',
        'as_addon_product',
        'minimum_order_product',
        'printcmmode_product',
        'florist_uuid',
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y h:i:s',
        'updated_at' => 'datetime:d-m-Y h:i:s',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model['uuid']          = Uuid::uuid4()->toString();
            $model['code_product']  = "BD" . date('y') . mt_rand(10,99) . str_pad((self::get()->count()) + 1, 2, "0", STR_PAD_LEFT);
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
     * Get the category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hasCategory()
    {
        return $this->hasMany(ProductCategory::class, 'products_uuid');
    }

     /**
     * Get the subcategory that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hasSubCategory()
    {
        return $this->hasMany(ProductSubCategory::class, 'products_uuid');
    }

    /**
     * Get the color that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hasColor()
    {
        return $this->hasMany(ProductColor::class, 'products_uuid', 'id');
    }

    /**
     * Get all of the materials for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materials()
    {
        return $this->hasMany(Material::class, 'products_uuid', 'uuid');
    }

    /**
     * Get all of the references for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function references()
    {
        return $this->hasMany(Reference::class, 'products_foreign_uuid', 'uuid');
    }


}
