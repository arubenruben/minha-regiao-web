<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Clickbar\Magellan\Database\PostgisFunctions\ST;

class DistrictHomepageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $results = []

        foreach ($this->resource as $district) {
            $results[] = [
                'id' => $district['id'],
                'name' => $district['name'],
                'geo_polygon' => ST::simplify($district['geo_polygon'], 0.0001), // Simplify the geo_polygon for better performance
            ];
        }


        dump($this->resource);
        return parent::toArray($request);
    }
}
