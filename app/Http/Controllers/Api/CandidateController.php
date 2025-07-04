<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreCandidateRequest;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CandidateController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/candidates",
     *     summary="List candidates",
     *     tags={"Candidates"},
     *     @OA\Response(
     *         response=200,
     *         description="List of candidates",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Candidate")
     *         )
     *     )
     * )
     */
    public function index()
    {
        return Candidate::all()->toResourceCollection();
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
    public function store(StoreCandidateRequest $request)
    {
        $candidate = Candidate::create($request->all());

        return response()->json($candidate, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/candidates/{id}",
     *     operationId="getCandidateById",
     *     tags={"Candidates"},
     *     summary="Get candidate information",
     *     description="Returns candidate data",
     *     @OA\Parameter(
     *         name="id",
     *         description="Candidate id",
     *         required=true,
     *         in="path",
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#components/schemas/Candidate")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Candidate not found"
     *     )
     * )
     */
    public function show(Candidate $candidate)
    {
        return $candidate->toResource();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate)
    {
        abort(501, 'Not Implemented');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidate $candidate)
    {
        abort(501, 'Not Implemented');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        abort(501, 'Not Implemented');
    }
}
