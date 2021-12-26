<?php

namespace App\Models\BasicSetting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyRate extends Model
{
    use HasFactory;
    protected $table = "currency_rate";
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    protected $fillable = [
        'currency_code_from_id',
        'currency_code_to_id',
        'value'
    ];

    public function currencyCodeFrom()
    {
        return $this->belongsTo(Currency::class, 'currency_code_from_id', 'id');
    }

    public function currencyCodeTo()
    {
        return $this->belongsTo(Currency::class, 'currency_code_to_id', 'id');
    }
}
