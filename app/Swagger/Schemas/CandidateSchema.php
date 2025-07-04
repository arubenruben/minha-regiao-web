<?php

namespace App\Swagger\Schemas;

/**
 * @OA\Schema(
 *     schema="Candidate",
 *     required={"id", "name", "election_result_id"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="João Silva"),
 *     @OA\Property(property="election_result_id", type="integer", example=1),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2023-01-01T00:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2023-01-01T00:00:00Z"),
 * )
 */
class CandidateSchema
{
}
