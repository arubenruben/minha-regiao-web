<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parish extends Model
{
    /** @use HasFactory<\Database\Factories\ParishFactory> */
    use HasFactory;

    protected $fillable = [
        'freguesia_pt_entry_id',
        'city_id',
        'old_geo_polygon',
        'old_polygon_centroid'
    ];

    public function freguesiaPtEntry()
    {
        return $this->morphOne(FreguesiaPTEntry::class, 'entity');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
