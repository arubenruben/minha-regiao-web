<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DistrictResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {

        $cities = $this->freguesiaPtEntry->entity()->cities()->toResourceCollection();

        # Remove 'geo_polygon' and 'polygon_centroid' from the cities
        $cities->each(function ($city) {
            if (isset($city['geo_polygon'])) {
                unset($city['geo_polygon']);
            }
            if (isset($city['polygon_centroid'])) {
                unset($city['polygon_centroid']);
            }
        });

        # Remove refereces if exists to 'parishes'
        $cities->each(function ($city) {
            if (isset($city['parishes'])) {
                unset($city['parishes']);
            }
        });

        return [
            'id' => $this->id,
            'name' => $this->freguesiaPtEntry->name,
            'address' => $this->freguesiaPtEntry->address,
            'email' => $this->freguesiaPtEntry->email,
            'phone' => $this->freguesiaPtEntry->phone,
            'website' => $this->freguesiaPtEntry->website,
            'freguesia_pt_entry_id' => $this->freguesiaPtEntry->id,
            'geo_polygon' => $this->freguesiaPtEntry->geo_polygon,
            'polygon_centroid' => $this->freguesiaPtEntry->polygon_centroid,
            'cities' => $cities
        ];
    }
}
