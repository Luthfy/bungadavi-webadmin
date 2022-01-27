<?php

namespace App\Models\Client;

use Ramsey\Uuid\Uuid;
use App\Models\Location\City;
use App\Models\Location\Country;
use App\Models\Location\Village;
use App\Models\Location\ZipCode;
use App\Models\Location\District;
use App\Models\Location\Province;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Corporate extends Model
{
    use HasFactory, SoftDeletes;

    protected $table        = "client_corporate";
    protected $primaryKey   = 'uuid';
    protected $keyType      = 'string';

    public $incrementing = false;

    protected $fillable = [
        'uuid',
        'fullname',
        'owner',
        'email',
        'phone',
        'mobile',
        'website',
        'legal_type',
        'npwp',
        'npwp_image',
        'latitude',
        'longitude',
        'address',
        'country_id',
        'province_id',
        'city_id',
        'district_id',
        'village_id',
        'zipcode_id',
        'is_active'
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
