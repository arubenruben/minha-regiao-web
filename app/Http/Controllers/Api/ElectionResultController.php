<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreElectionResultRequest;
use App\Models\ElectionResult;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ElectionResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ElectionResult::all()->toResourceCollection();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreElectionResultRequest $request)
    {
        $electionResult = ElectionResult::create($request->validated());
        return response()->json($electionResult, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ElectionResult $electionResult)
    {
        return $electionResult->toResource();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ElectionResult $electionResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ElectionResult $electionResult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ElectionResult $electionResult)
    {
        //
    }
}
