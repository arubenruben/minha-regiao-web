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
}
