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
     * Display a listing of the resource.
     */
    public function index()
    {
        return District::all()->toResourceCollection();
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
     * Display the specified resource.
     */
    public function show(District $district)
    {
        return new DistrictResource($district);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(District $district)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, District $district)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(District $district)
    {
        //
    }
}
