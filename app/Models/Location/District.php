<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location\Country;
use App\Models\Location\Province;
use App\Models\Location\City;
use App\Models\Location\Village;
use App\Models\Location\ZipCode;

class District extends Model
{
    use HasFactory;
    protected $table = "district";
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    protected $fillable = [
        'country_id',
        'province_id',
        'city_id',
        'name',
        'jne_code',
        'sicepat_code',
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

    public function hasVillage()
    {
        return $this->hasMany(Village::class, 'district_id', 'id');
    }

    public function hasZipCode()
    {
        return $this->hasMany(ZipCode::class, 'district_id', 'id');
    }

    public function hasCourier()
    {
        return $this->hasMany(Courier::class, 'district', 'id');
    }
}
