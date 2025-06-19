<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FreguesiaPTEntryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if ($this->entity_type === 'App\Models\District') {
            $type = 'District';
        } elseif ($this->entity_type === 'App\Models\City') {
            $type = 'City';
        } elseif ($this->entity_type === 'App\Models\Parish') {
            $type = 'Parish';
        } else {
            throw new \Exception("Unknown entity type: {$this->entity_type}");
        }

        return [
            "id" => $this->id,
            "name" => $this->name,
            "type" => $type,
        ];
    }
}
