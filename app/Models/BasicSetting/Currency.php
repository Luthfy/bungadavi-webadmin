<?php

namespace App\Models\BasicSetting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;
    protected $table = "currency";
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    protected $fillable = [
        'name',
        'code',
        'symbol'
    ];

    public function hasCurrencyCodeFrom()
    {
        return $this->hasMany(CurrencyRate::class, 'currency_code_from_id', 'id');
    }

    public function hasCurrencyCodeTo()
    {
        return $this->hasMany(CurrencyRate::class, 'currency_code_to_id', 'id');
    }
}
