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
     * Display a listing of the resource.
     */
    public function index()
    {
        return Parish::all()->toResourceCollection();
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
        try {
            $parish = DB::transaction(function () use ($request) {
                $parish = Parish::create($request->validated());

                $parish->freguesiaPtEntry()->create($request->validated() + [
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
