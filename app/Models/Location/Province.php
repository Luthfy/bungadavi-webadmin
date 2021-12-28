<?php

namespace App\Models\Location;

use App\Models\Client\Personal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location\Country;
use App\Models\Location\City;
use App\Models\Location\District;
use App\Models\Location\Village;
use App\Models\Location\ZipCode;

class Province extends Model
{
    use HasFactory;
    protected $table = "province";
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    protected $fillable = [
        'country_id',
        'name',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function hasCity()
    {
        return $this->hasMany(City::class, 'province_id', 'id');
    }

    public function hasDistrict()
    {
        return $this->hasMany(District::class, 'province_id', 'id');
    }

    public function hasVillage()
    {
        return $this->hasMany(Village::class, 'province_id', 'id');
    }

    public function hasZipCode()
    {
        return $this->hasMany(ZipCode::class, 'province_id', 'id');
    }

    public function hasCourier()
    {
        return $this->hasMany(Courier::class, 'province', 'id');
    }

    public function hasPersonal()
    {
        return $this->hasMany(Personal::class, 'province_id', 'id');
    }
}
