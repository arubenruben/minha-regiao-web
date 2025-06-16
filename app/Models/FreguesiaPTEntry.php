<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    public function entity()
    {
        return $this->morphTo();
    }

}
