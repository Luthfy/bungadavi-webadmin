<?php

namespace App\Models\Location;

use App\Models\Client\Personal;
use App\Models\Client\PersonalRecipient;
use App\Models\Courier\Courier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location\Province;
use App\Models\Location\City;
use App\Models\Location\District;
use App\Models\Location\Village;
use App\Models\Location\ZipCode;

class Country extends Model
{
    use HasFactory;
    protected $table = "country";
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    protected $fillable = [
        'code',
        'name',
        'base_curr_name',
        'base_curr_code',
        'base_curr_symbol',

    ];

    public function hasProvince()
    {
        return $this->hasMany(Province::class, 'country_id', 'id');
    }

    public function hasCity()
    {
        return $this->hasMany(City::class, 'country_id', 'id');
    }

    public function hasDistrict()
    {
        return $this->hasMany(District::class, 'country_id', 'id');
    }

    public function hasVillage()
    {
        return $this->hasMany(Village::class, 'country_id', 'id');
    }

    public function hasZipCode()
    {
        return $this->hasMany(ZipCode::class, 'country_id', 'id');
    }

    public function hasCourier()
    {
        return $this->hasMany(Courier::class, 'country', 'id');
    }

    public function hasPersonal()
    {
        return $this->hasMany(Personal::class, 'country_id', 'id');
    }

    public function hasPersonalRecipient()
    {
        return $this->hasMany(PersonalRecipient::class, 'country_id', 'id');
    }
}
