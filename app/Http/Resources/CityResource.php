<?php

namespace App\Http\Resources;

use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        $parishes = $this->parishes->map(function ($parish) {            
            return [
                'name' => $parish->freguesiaPtEntry->name,
                'geo_polygon' => $parish->freguesiaPtEntry->geo_polygon,
                'elections' => $parish->freguesiaPtEntry->elections->toResourceCollection()
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
            'parishes' => $parishes,
            'wikipedia' => $this->freguesiaPtEntry->wikipedia,
            'district' => District::with('freguesiaPtEntry')->find($this->district_id),
            'elections' => $this->freguesiaPtEntry->elections->toResourceCollection(),
        ];
    }
}