<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\City;
use App\Models\District;

class ParishResource extends JsonResource
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

        // Return full detailed version for individual parish calls
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
            'wikipedia' => $this->freguesiaPtEntry->wikipedia,
            'city' => City::with('freguesiaPtEntry')->find($this->city_id),
            'district' => District::with('freguesiaPtEntry')->find($this->city->district_id),
            'elections' => $this->freguesiaPtEntry->elections->toResourceCollection(),
        ];
    }
}