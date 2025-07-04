<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreParishRequest;
use App\Models\Parish;
use DB;
use Illuminate\Http\Request;
use App\Http\Resources\ParishResource;

class ParishController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/parishes",
     *     summary="List parishes",
     *     tags={"Parishes"},
     *     @OA\Response(
     *         response=200,
     *         description="List of parishes",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Parish")
     *         )
     *     )
     * )
     */
    public function index()
    {
        $parishes = Parish::with('freguesiaPtEntry')->get();
        return ParishResource::collection($parishes->map(function ($parish) {
            return ParishResource::simplified($parish);
        }));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort(501, 'Not implemented');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreParishRequest $request)
    {
        try {
            $parish = DB::transaction(function () use ($request) {
                $parish = Parish::create($request->all());

                $parish->freguesiaPtEntry()->create($request->all() + [
                    'entity_type' => 'App\Models\Parish',
                    'entity_id' => $parish->id,
                ]);

                return $parish;
            });

            return new ParishResource($parish);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create parish: ' . $e->getMessage()], 500);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/parishes/{parish}",
     *     summary="Show a specific parish",
     *     tags={"Parishes"},
     *     @OA\Parameter(
     *         name="parish",
     *         in="path",
     *         required=true,
     *         description="Parish ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Parish details",
     *         @OA\JsonContent(ref="#/components/schemas/Parish")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Parish not found"
     *     )
     * )
     */
    public function show(Parish $parish)
    {
        return $parish->toResource();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parish $parish)
    {
        abort(501, 'Not implemented');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parish $parish)
    {
        abort(501, 'Not implemented');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parish $parish)
    {
        abort(501, 'Not implemented');
    }
}
