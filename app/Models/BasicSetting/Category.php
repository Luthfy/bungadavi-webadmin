<?php

namespace App\Models\BasicSetting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "category";
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    protected $fillable = [
        'name',
        'name_en',
        'priority',
        'photo',
        'is_active',
    ];

    public function hasCategory()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }
}
