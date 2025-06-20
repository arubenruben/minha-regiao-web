<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Election;

class ElectionWithLocalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        [$district, $city, $parish] = $this->getLocationHierarchy();

        $all_elections = $this->freguesiaPtEntry->elections()
            ->where('year', '!=', $this->year)
            ->get();
        
        return [
            "id" => $this->id,
            "year" => $this->year,
            "number_participant_voters" => $this->number_participant_voters,
            "number_registered_voters" => $this->number_registered_voters,
            "number_blank_votes" => $this->number_blank_votes,
            "number_null_votes" => $this->number_null_votes,
            "number_absentee_votes" => $this->number_absentee_votes,
            "election_results" => $this->electionResults->toResourceCollection(), 
            "other_elections" => $all_elections->toResourceCollection(),         
            "district" => $district ? $district->toResource() : null,
            "city" => $city ? $city->toResource() : null,
            "parish" => $parish ? $parish->toResource() : null,
        ];
    }

    private function getLocationHierarchy(): array
    {
        $entity = $this->freguesiaPtEntry->entity;

        return match ($this->freguesiaPtEntry->entity_type) {
            'App\Models\City' => [$entity->district, $entity, null],
            'App\Models\Parish' => [$entity->city->district, $entity->city, $entity],
            'App\Models\District' => [$entity, null, null],
            default => throw new \Exception("Unknown entity type: " . $this->freguesiaPtEntry->entity_type)
        };
    }
}
