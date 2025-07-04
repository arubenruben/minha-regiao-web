<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreCityRequest;
use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/cities",
     *     summary="List cities",
     *     tags={"Cities"},
     *     @OA\Response(
     *         response=200,
     *         description="List of cities",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/City")
     *         )
     *     )
     * )
     */
    public function index()
    {
        $cities = City::with('freguesiaPtEntry')->get();
        return CityResource::collection($cities->map(function ($city) {
            return CityResource::simplified($city);
        }));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort(501, 'Not Implemented');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCityRequest $request)
    {
        try {
            $city = DB::transaction(function () use ($request) {
                $city = City::create($request->all());

                $city->freguesiaPtEntry()->create($request->all() + [
                    'entity_type' => 'App\Models\City',
                    'entity_id' => $city->id,
                ]);

                return $city;
            });

            return new CityResource($city);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create city: ' . $e->getMessage()], 500);
        }
    }
    /**
     * @OA\Get(
     *     path="/api/cities/{id}",
     *     summary="Get a specific city",
     *     tags={"Cities"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="City details",
     *         @OA\JsonContent(ref="#/components/schemas/City")
     *     )
     * )
     */

    public function show(City $city)
    {
        return $city->toResource();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        abort(501, 'Not Implemented');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        abort(501, 'Not Implemented');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        abort(501, 'Not Implemented');
    }
}
