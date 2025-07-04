<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreDistrictRequest;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DistrictResource;
use Illuminate\Support\Facades\DB;

class DistrictController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/districts",
     *     summary="List districts",
     *     tags={"Districts"},
     *     @OA\Response(
     *         response=200,
     *         description="List of districts",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/District")
     *         )
     *     )
     * )
     */
    public function index()
    {
        $districts = District::with('freguesiaPtEntry')->get();
        return DistrictResource::collection($districts->map(function ($district) {
            return DistrictResource::simplified($district);
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
    public function store(StoreDistrictRequest $request)
    {
        try {
            $district = DB::transaction(function () use ($request) {
                $district = District::create();

                $district->freguesiaPtEntry()->create($request->all() + [
                    'entity_type' => 'App\Models\District',
                    'entity_id' => $district->id,
                ]);

                return $district;
            });

            return new DistrictResource($district);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create district: ' . $e->getMessage()], 500);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/districts/{district}",
     *     summary="Show a specific district",
     *     tags={"Districts"},
     *     @OA\Parameter(
     *         name="district",
     *         in="path",
     *         required=true,
     *         description="District ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="District details",
     *         @OA\JsonContent(ref="#/components/schemas/District")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="District not found"
     *     )
     * )
     */
    public function show(District $district)
    {
        return $district->toResource();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(District $district)
    {
        abort(501, 'Not Implemented');
    }

    public function update(Request $request, District $district)
    {
        abort(501, 'Not Implemented');
    }

    public function destroy(District $district)
    {
        abort(501, 'Not Implemented');
    }
}
