<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class DistrictHomepageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->freguesiaPtEntry->name,
            'geo_polygon' => json_decode(DB::table('freguesia_pt_entries')
                ->selectRaw('ST_AsGeoJSON(ST_SimplifyPreserveTopology(geo_polygon, ?)) as geojson', [0.001])
                ->where('id', $this->id)
                ->first()->geojson, true),
        ];
    }
}
