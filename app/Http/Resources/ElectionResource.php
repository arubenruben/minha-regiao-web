<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ElectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        #dump("Tou dentro de election resource");

        return [
            'id' => $this->id,
            'year' => $this->year,
            'number_participant_voters' => $this->number_participant_voters,
            'number_registered_voters' => $this->number_registered_voters,
            'number_blank_votes' => $this->number_blank_votes,
            'number_null_votes' => $this->number_null_votes,
            'number_absentee_votes' => $this->number_absentee_votes,
            'freguesia_pt_entry_id' => $this->freguesia_pt_entry_id,
            'election_results' => ElectionResultResource::collection($this->electionResults),
            'winner' => $this->winner
        ];
    }
}
