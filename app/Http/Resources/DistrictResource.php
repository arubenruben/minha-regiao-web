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
        # Remove all attributes in cities that are not: name, geo_polygon
        $cities = $this->cities->map(function ($city) {
            return [
                'freguesias_pt_entry_id' => $city->freguesiaPtEntry->id,
                'name' => $city->freguesiaPtEntry->name,
                'geo_polygon' => $city->freguesiaPtEntry->geo_polygon,
                'elections' => $city->freguesiaPtEntry->elections()->get()->toResourceCollection()
            ];
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
            'cities' => $cities,
            'wikipedia' => $this->freguesiaPtEntry->wikipedia,
        ];
    }
}
