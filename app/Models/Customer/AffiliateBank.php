<?php

namespace App\Models\Customer;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AffiliateBank extends Model
{
    use HasFactory, SoftDeletes;

    protected $table        = "client_florist_bank";
    protected $primaryKey   = 'uuid';
    protected $keyType      = 'string';

    public $incrementing = false;

    protected $fillable = [
        "bank_name",
        "bank_account_number",
        "bank_beneficiary",
        "bank_branch",
        "client_florist_uuid"
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y h:i:s',
        'updated_at' => 'datetime:d-m-Y h:i:s',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model['uuid'] = Uuid::uuid4()->toString();
            return $model;
        });
    }
}
