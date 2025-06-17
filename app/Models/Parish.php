<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Clickbar\Magellan\Data\Geometries\MultiPolygon;
use Clickbar\Magellan\Data\Geometries\Point;

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
    protected $casts = [
        'old_geo_polygon' => MultiPolygon::class,
        'old_polygon_centroid' => Point::class,
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
