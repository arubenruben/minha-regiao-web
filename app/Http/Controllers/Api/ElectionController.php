<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreElectionRequest;
use App\Models\Election;
use Illuminate\Http\Request;

class ElectionController extends Controller
{
    public function index()
    {
        abort(501, 'Not implemented');
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
    public function store(StoreElectionRequest $request)
    {
        $election = Election::create($request->all());

        return response()->json($election, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/elections/{election}",
     *     summary="Show a specific election",
     *     tags={"Elections"},
     *     @OA\Parameter(
     *         name="election",
     *         in="path",
     *         required=true,
     *         description="Election ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Election details",
     *         @OA\JsonContent(ref="#/components/schemas/Election")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Election not found"
     *     )
     * )
     */
    public function show(Election $election)
    {
        return $election->toResource();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Election $election)
    {
        abort(501, 'Not implemented');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Election $election)
    {
        abort(501, 'Not implemented');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Election $election)
    {
        abort(501, 'Not implemented');
    }
}
