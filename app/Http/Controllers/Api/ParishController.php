<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreParishRequest;
use App\Models\Parish;
use Illuminate\Http\Request;
use App\Http\Resources\ParishResource;

class ParishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parishes = Parish::all();
        return ParishResource::collection($parishes);
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
    public function store(StoreParishRequest $request)
    {
        $parish = Parish::create($request->all());
        return response()->json($parish, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Parish $parish)
    {
        return new ParishResource($parish);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parish $parish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parish $parish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parish $parish)
    {
        //
    }
}
