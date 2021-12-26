<?php

namespace App\Models\BasicSetting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = "subcategory";
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    protected $fillable = [
        'category_id',
        'name',
        'name_en',
        'priority',
        'photo',
        'is_active',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
