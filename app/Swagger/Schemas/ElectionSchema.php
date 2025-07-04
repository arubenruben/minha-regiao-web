<?php

namespace App\Swagger\Schemas;

/**
 * @OA\Schema(
 *     schema="Election",
 *     required={"id", "year", "freguesia_pt_entry_id"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="year", type="integer", example=2021),
 *     @OA\Property(property="number_participant_voters", type="integer", example=1500),
 *     @OA\Property(property="number_registered_voters", type="integer", example=2000),
 *     @OA\Property(property="number_blank_votes", type="integer", example=50),
 *     @OA\Property(property="number_null_votes", type="integer", example=25),
 *     @OA\Property(property="number_absentee_votes", type="integer", example=475),
 *     @OA\Property(property="freguesia_pt_entry_id", type="integer", example=1),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2023-01-01T00:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2023-01-01T00:00:00Z"),
 * )
 */
class ElectionSchema
{
}
