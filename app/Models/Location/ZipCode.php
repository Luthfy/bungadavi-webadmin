<?php

namespace App\Models\Location;

use App\Models\Client\Florist;
use App\Models\Client\Personal;
use App\Models\Client\PersonalRecipient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location\Country;
use App\Models\Location\Province;
use App\Models\Location\City;
use App\Models\Location\District;
use App\Models\Location\Village;

class ZipCode extends Model
{
    use HasFactory;
    protected $table = "zipcode";
    protected $fillable = [
        'country_id',
        'province_id',
        'city_id',
        'district_id',
        'village_id',
        'postal_code',
    ];

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

    public function hasPersonal()
    {
        return $this->hasMany(Personal::class, 'zipcode_id', 'id');
    }

    public function hasPersonalRecipient()
    {
        return $this->hasMany(PersonalRecipient::class, 'zipcode_id', 'id');
    }

    public function hasFlorist()
    {
        return $this->hasMany(Florist::class, 'zipcode_id', 'id');
    }

    public function hasCorporate()
    {
        return $this->hasMany(Corporate::class, 'zipcode_id', 'id');
    }
}
