<?php

namespace App\Models\BasicSetting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $table        = "unit";
    protected $primaryKey   = 'id';
    protected $keyType      = 'integer';

    protected $fillable = [
        'name'
    ];
}
