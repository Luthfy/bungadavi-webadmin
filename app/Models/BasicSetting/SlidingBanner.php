<?php

namespace App\Models\BasicSetting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlidingBanner extends Model
{
    use HasFactory;
    protected $table = "sliding_banner";
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    protected $fillable = [
        'banner',
        'type',
        'banner_start_date',
        'banner_end_date',
        'title',
        'title_en',
        'description',
        'description_en',
        'is_active',
    ];
}
