<?php

namespace App\Models\Client;

use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use App\Models\Location\City;
use App\Models\Location\Country;
use App\Models\Location\Village;
use App\Models\Location\ZipCode;
use App\Models\Location\District;
use App\Models\Location\Province;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personal extends Model
{
    use HasFactory;

    protected $table        = "client_personal";
    protected $primaryKey   = 'uuid';
    protected $keyType      = 'string';

    public $incrementing = false;

    protected $fillable = [
        'fullname',
        'firstname',
        'lastname',
        'phone',
        'mobile',
        'gender',
        'birthday',
        'address',
        'country_id',
        'province_id',
        'city_id',
        'district_id',
        'village_id',
        'zipcode_id',
        'refferal',
        'sharelink',
        'email',
        'username',
        'password',
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
            $model['pass_access']       = mt_rand(1000, 9999);
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

    public function hasPersonalRecipient()
    {
        return $this->hasMany(PersonalRecipient::class, 'client_personal_uuid', 'uuid');
    }

}
