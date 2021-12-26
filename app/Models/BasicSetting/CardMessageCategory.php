<?php

namespace App\Models\BasicSetting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardMessageCategory extends Model
{
    use HasFactory;
    protected $table = "card_message_category";
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    protected $fillable = [
        'name'
    ];

    public function hasCardMessageSubCategory()
    {
        return $this->hasMany(CardMessageSubCategory::class, 'card_message_category_id', 'id');
    }
}
