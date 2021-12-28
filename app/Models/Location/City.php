<?php

namespace App\Models\Location;

use App\Models\Client\Personal;
use App\Models\Client\PersonalRecipient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location\Country;
use App\Models\Location\Province;
use App\Models\Location\District;
use App\Models\Location\Village;
use App\Models\Location\ZipCode;

class City extends Model
{
    use HasFactory;

    protected $table        = "city";
    protected $primaryKey   = 'id';
    protected $keyType      = 'integer';

    protected $fillable = [
        'country_id',
        'province_id',
        'alias',
        'name',
        'code'
    ];

    /**
     * Get the provinces that owns the City
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function hasDistrict()
    {
        return $this->hasMany(District::class, 'city_id', 'id');
    }

    public function hasVillage()
    {
        return $this->hasMany(Village::class, 'city_id', 'id');
    }

    public function hasZipCode()
    {
        return $this->hasMany(ZipCode::class, 'city_id', 'id');
    }

    public function hasCourier()
    {
        return $this->hasMany(Courier::class, 'city', 'id');
    }

    public function hasPersonal()
    {
        return $this->hasMany(Personal::class, 'city_id', 'id');
    }

    public function hasPersonalRecipient()
    {
        return $this->hasMany(PersonalRecipient::class, 'city_id', 'id');
    }
}
