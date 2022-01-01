<?php

namespace App\Models\Courier;

use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use App\Models\Location\City;
use App\Models\Location\Country;
use App\Models\Location\Village;
use App\Models\Location\ZipCode;
use App\Models\Location\District;
use App\Models\Location\Province;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Courier extends Model
{
    use HasFactory, SoftDeletes;

    protected $table        = "couriers";
    protected $primaryKey   = 'uuid';
    protected $keyType      = 'string';

    public $incrementing = false;

    protected $fillable = [
        'unique_code_courier',
        'username',
        'email',
        'password',
        'fullname',
        'mobile',
        'gender',
        'DOB',
        'marital_status',
        'point',
        'ktp',
        'ktp_images',
        'npwp',
        'npwp_images',
        'license_type',
        'license_number',
        'license_image',
        'license_expired_date',
        'address',
        'country',
        'province',
        'city',
        'district',
        'village',
        'zipcode',
        'join_date',
        'end_date',
        'contract_number',
        'terminate_date',
        'terminate_description',
        'bank_name',
        'bank_beneficiary_name',
        'bank_account_number',
        'bank_branch',
        'photo',
        'fcm',
        'is_active',
        'florist_uuid',
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y h:i:s',
        'updated_at' => 'datetime:d-m-Y h:i:s',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $prefix = "UND";
            // if (auth()) {
            //     if (auth()->user()->hasRole('bungadavi')) {
            //         $prefix = "CBDO";
            //     } else {
            //         $prefix = "CBDA";
            //     }
            // }

            $model['uuid']      = Uuid::uuid4()->toString();
            $model['token']     = Str::random(10);
            $model['user_uuid'] = auth()->user()->uuid ?? null;
            $model['unique_code_courier']  = $prefix . date('Ymdhis') . str_pad((self::get()->where('florist_uuid', auth()->user()->uuid ?? '0')->count()) + 1, 4, "0", STR_PAD_LEFT);
            return $model;
        });

        self::updating(function ($model) {
            $model['user_uuid'] = auth()->user()->uuid;
            return $model;
        });
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country', 'id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city', 'id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district', 'id');
    }

    public function village()
    {
        return $this->belongsTo(Village::class, 'village', 'id');
    }

    public function zipcode()
    {
        return $this->belongsTo(ZipCode::class, 'zipcode', 'id');
    }
}
