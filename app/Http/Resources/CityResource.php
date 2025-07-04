<?php

namespace App\Http\Resources;

use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
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

        // Return full detailed version for individual city calls
        $parishes = $this->parishes->map(function ($parish) {            
            return [
                'freguesias_pt_entry_id' => $parish->freguesiaPtEntry->id,
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