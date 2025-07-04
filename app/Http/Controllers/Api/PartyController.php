<?php

namespace App\Http\Controllers\Api;

use App\Models\Party;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartyController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/parties",
     *     summary="List parties",
     *     tags={"Parties"},
     *     @OA\Response(
     *         response=200,
     *         description="List of parties",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Party")
     *         )
     *     )
     * )
     */
    public function index()
    {
        return Party::all();
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
    public function store(Request $request)
    {
        $party = Party::create($request->all());

        return response()->json($party, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/parties/{party}",
     *     summary="Show a specific party",
     *     tags={"Parties"},
     *     @OA\Parameter(
     *         name="party",
     *         in="path",
     *         required=true,
     *         description="Party ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Party details",
     *         @OA\JsonContent(ref="#/components/schemas/Party")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Party not found"
     *     )
     * )
     */
    public function show(Party $party)
    {
        return $party->toResource();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Party $party)
    {
        abort(501, 'Not implemented');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Party $party)
    {
        abort(501, 'Not implemented');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Party $party)
    {
        abort(501, 'Not implemented');
    }
}
