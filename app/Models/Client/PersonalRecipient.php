<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use App\Models\Location\City;
use App\Models\Location\Country;
use App\Models\Location\Village;
use App\Models\Location\ZipCode;
use App\Models\Location\District;
use App\Models\Location\Province;

class PersonalRecipient extends Model
{
    use HasFactory;

    protected $table        = "client_personal_recipient";
    protected $primaryKey   = 'uuid';
    protected $keyType      = 'string';

    public $incrementing = false;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'mobile',
        'gender',
        'birthday',
        'latitude',
        'longitude',
        'address',
        'country_id',
        'province_id',
        'city_id',
        'district_id',
        'village_id',
        'zipcode_id',
        'client_personal_uuid',
        'is_active',
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y h:i:s',
        'updated_at' => 'datetime:d-m-Y h:i:s',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model['uuid']              = Uuid::uuid4()->toString();
            $model['remember_token']    = Str::random(10);
            return $model;
        });
    }

    public function clientPersonal()
    {
        return $this->belongsTo(Personal::class, 'client_personal_uuid', 'uuid');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function village()
    {
        return $this->belongsTo(Village::class, 'village_id', 'id');
    }

    public function zipcode()
    {
        return $this->belongsTo(ZipCode::class, 'zipcode_id', 'id');
    }
}
