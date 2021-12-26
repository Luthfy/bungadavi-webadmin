<?php

namespace App\Models\BasicSetting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardMessageSubCategory extends Model
{
    use HasFactory;
    protected $table = "card_message_subcategory";
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    protected $fillable = [
        'card_message_category_id',
        'name',
        'description'
    ];

    public function card_message_category()
    {
        return $this->belongsTo(CardMessageCategory::class, 'card_message_category_id', 'id');
    }
}
