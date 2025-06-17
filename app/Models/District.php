<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    /** @use HasFactory<\Database\Factories\DistrictFactory> */
    use HasFactory;

    public function freguesiaPtEntry()
    {
        return $this->morphOne(FreguesiaPTEntry::class, 'entity');
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'district_id');
    }

    public function parishes()
    {
        return $this->hasManyThrough(Parish::class, City::class, 'district_id', 'city_id');
    }
}
