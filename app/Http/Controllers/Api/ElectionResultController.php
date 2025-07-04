<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreElectionResultRequest;
use App\Models\ElectionResult;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ElectionResultController extends Controller
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
    public function store(StoreElectionResultRequest $request)
    {
        $electionResult = ElectionResult::create($request->all());
        return response()->json($electionResult, 201);
    }

    public function show(ElectionResult $electionResult)
    {
        abort(501, 'Not implemented');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ElectionResult $electionResult)
    {
        abort(501, 'Not implemented');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ElectionResult $electionResult)
    {
        abort(501, 'Not implemented');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ElectionResult $electionResult)
    {
        abort(501, 'Not implemented');
    }
}
