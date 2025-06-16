<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ParishResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            'name' => $this->relationLoaded('freguesiaPtEntry') ? $this->freguesiaPtEntry->name : null,
            'address' => $this->relationLoaded('freguesiaPtEntry') ? $this->freguesiaPtEntry->address : null,
            'email' => $this->relationLoaded('freguesiaPtEntry') ? $this->freguesiaPtEntry->email : null,
            'city' => $this->relationLoaded('city') ? $this->city : null,
        ];
    }
}
