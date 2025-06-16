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
        return [
            'id' => $this->id,
            'name' => $this->freguesiaPtEntry->name,
            'address' => $this->freguesiaPtEntry->address,
            'email' => $this->freguesiaPtEntry->email,
            'phone' => $this->freguesiaPtEntry->phone,
            'website' => $this->freguesiaPtEntry->website,
            'freguesia_pt_entry_id' => $this->freguesiaPtEntry->id,
        ];
    }
}
