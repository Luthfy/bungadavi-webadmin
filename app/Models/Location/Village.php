<?php

namespace App\Models\Location;

use App\Models\Client\Personal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location\Country;
use App\Models\Location\Province;
use App\Models\Location\City;
use App\Models\Location\District;
use App\Models\Location\ZipCode;

class Village extends Model
{
    use HasFactory;
    protected $table = "village";
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    protected $fillable = [
        'country_id',
        'province_id',
        'city_id',
        'district_id',
        'name',
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

    public function hasZipCode()
    {
        return $this->hasMany(ZipCode::class, 'village_id', 'id');
    }

    public function hasPersonal()
    {
        return $this->hasMany(Personal::class, 'village_id', 'id');
    }
}
