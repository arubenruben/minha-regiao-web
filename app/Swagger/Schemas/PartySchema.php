<?php

namespace App\Swagger\Schemas;

/**
 * @OA\Schema(
 *     schema="Party",
 *     required={"id", "name", "acronym"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Partido Socialista"),
 *     @OA\Property(property="acronym", type="string", example="PS"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2023-01-01T00:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2023-01-01T00:00:00Z"),
 * )
 */
class PartySchema
{
}
