<?php

namespace App\Swagger\Schemas;

/**
 * @OA\Schema(
 *     schema="ElectionResult",
 *     required={"id", "election_id", "party_id", "number_votes"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="number_votes", type="integer", example=1250),
 *     @OA\Property(property="percentage_votes", type="number", format="float", example=35.5),
 *     @OA\Property(property="election_id", type="integer", example=1),
 *     @OA\Property(property="party_id", type="integer", example=1),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2023-01-01T00:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2023-01-01T00:00:00Z"),
 * )
 */
class ElectionResultSchema
{
}
