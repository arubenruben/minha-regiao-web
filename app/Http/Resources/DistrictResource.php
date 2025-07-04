<?php

namespace App\Http\Resources;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DistrictResource extends JsonResource
{
    /**
     * Indicates if the resource should return simplified data
     */
    private bool $simplified = false;

    /**
     * Create a new resource instance for simplified output
     */
    public static function simplified($resource)
    {
        $instance = new static($resource);
        $instance->simplified = true;
        return $instance;
    }

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Return simplified version for API index calls
        if ($this->simplified) {
            return [
                'id' => $this->id,
                'name' => $this->freguesiaPtEntry->name,
                'freguesia_pt_entry_id' => $this->freguesiaPtEntry->id,
            ];
        }

        // Return full detailed version for individual district calls
        # Remove all attributes in cities that are not: name, geo_polygon
        $cities = $this->cities->map(function ($city) {
            if ($city->freguesiaPtEntry->entity_type === "App\Models\City") {
                $type = "city";
            } else if ($city->freguesiaPtEntry->entity_type === "App\Models\Parish") {
                $type = "parish";
            } else if ($city->freguesiaPtEntry->entity_type === "App\Models\District") {
                $type = "district";
            } else {
                throw new Exception("Error Processing Request", 1);
            }

            return [
                'freguesias_pt_entry_id' => $city->freguesiaPtEntry->id,
                'name' => $city->freguesiaPtEntry->name,
                'geo_polygon' => $city->freguesiaPtEntry->geo_polygon,
                'type' => $type,
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
