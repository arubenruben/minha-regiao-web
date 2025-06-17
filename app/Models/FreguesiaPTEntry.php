<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Clickbar\Magellan\Data\Geometries\MultiPolygon;
use Clickbar\Magellan\Data\Geometries\Point;

class FreguesiaPTEntry extends Model
{

    protected $table = "freguesia_pt_entries";
    protected $fillable = [
        'name',
        'freguesia_pt_id',
        'freguesia_pt_url',
        'address',
        'email',
        'phone',
        'website',
        'geo_polygon',
        'polygon_centroid',
        'entity_type',
        'entity_id',
    ];
    protected $casts = [
        'geo_polygon' => MultiPolygon::class,
        'polygon_centroid' => Point::class,
    ];

    public function entity()
    {
        return $this->morphTo();
    }

    public function wikipedia()
    {
        return $this->hasOne(Wikipedia::class, 'freguesia_pt_entry_id');
    }

}
