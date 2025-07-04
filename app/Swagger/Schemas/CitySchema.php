<?php

namespace App\Swagger\Schemas;

/**
 * @OA\Schema(
 *     schema="City",
 *     required={"id", "district_id"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Lisboa"),
 *     @OA\Property(property="address", type="string", example="Praça do Município, 1100-365 Lisboa"),
 *     @OA\Property(property="email", type="string", format="email", example="info@cm-lisboa.pt"),
 *     @OA\Property(property="phone", type="string", example="218 170 000"),
 *     @OA\Property(property="website", type="string", format="uri", example="https://www.lisboa.pt"),
 *     @OA\Property(property="freguesia_pt_entry_id", type="integer", example=1),
 *     @OA\Property(property="geo_polygon", type="string", description="Geometric polygon data", example="MULTIPOLYGON(((0 0, 0 1, 1 1, 1 0, 0 0)))"),
 *     @OA\Property(property="polygon_centroid", type="string", description="Geometric point data", example="POINT(0.5 0.5)"),
 *     @OA\Property(property="district_id", type="integer", example=1),
 *     @OA\Property(property="parishes", type="array", @OA\Items(type="object")),
 *     @OA\Property(property="wikipedia", type="object"),
 *     @OA\Property(property="district", type="object"),
 *     @OA\Property(property="elections", type="array", @OA\Items(type="object")),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2023-01-01T00:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2023-01-01T00:00:00Z"),
 * )
 */
class CitySchema
{
}
