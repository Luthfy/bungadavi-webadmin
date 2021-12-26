<?php

namespace App\Models\BasicSetting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $table = "color";
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    protected $fillable = [
        'name',
        'hexa'
    ];
}
