<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /** @use HasFactory<\Database\Factories\CityFactory> */
    use HasFactory;

    protected $fillable = [
        'district_id',
    ];

    public function freguesiaPtEntry()
    {
        return $this->morphOne(FreguesiaPTEntry::class, 'entity');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function parishes()
    {
        return $this->hasMany(Parish::class, 'city_id');
    }

    public function elections()
    {
        return $this->hasManyThrough(
            Election::class,
            FreguesiaPTEntry::class,
            'entity_id',
            'freguesia_pt_entry_id',
            'id',
            'id'
        )->where('entity_type', City::class);
    }

}
