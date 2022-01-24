<?php

namespace App\Models\Transaction;

use App\Models\Client\Personal;
use App\Models\Location\Province;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SenderReceiver extends Model
{
    use HasFactory, SoftDeletes;

    protected $table        = "sender_receiver_order_transactions";
    protected $primaryKey   = 'uuid';
    protected $keyType      = 'string';

    public $incrementing = false;

    protected $fillable = [
            'order_transactions_uuid',
            'client_type',
            'client_uuid',
            'is_secret',
            'pic_name',
            'sender_name',
            'po_referrence',
            'sender_phone_number',
            'sender_address',
            'sender_country',
            'sender_province',
            'sender_city',
            'sender_district',
            'sender_village',
            'sender_zipcode',
            'sender_latitude',
            'sender_longitude',
            'receiver_name',
            'receiver_phone_number',
            'receiver_address_info',
            'receiver_address',
            'receiver_country',
            'receiver_province',
            'receiver_city',
            'receiver_district',
            'receiver_village',
            'receiver_zipcode',
            'receiver_latitude',
            'receiver_longitude',
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

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_transactions_uuid', 'uuid');
    }

    public function client_personal()
    {
        return $this->hasMany(Personal::class, 'client_uuid', 'uuid');
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class, 'sender_receiver_uuid', 'uuid');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'receiver_village', 'id');
    }
}
