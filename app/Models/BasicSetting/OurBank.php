<?php

namespace App\Models\BasicSetting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurBank extends Model
{
    use HasFactory;
    protected $table = "our_bank";
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    protected $fillable = [
        'type',
        'bank_name',
        'bank_account_number',
        'bank_beneficiary_name',
        'bank_code',
        'bank_logo',
        'bank_branch',
    ];
}
