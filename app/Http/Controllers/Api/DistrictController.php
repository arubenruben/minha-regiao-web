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
        $districts = District::all();
        return DistrictResource::collection($districts);
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

                $district->freguesiaPtEntry()->create([
                    'name' => $request->input('name'),
                    'freguesias_pt_url' => $request->input('freguesias_pt_url'),
                    'freguesias_pt_id' => $request->input('freguesias_pt_id'),
                    'address' => $request->input('address'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'website' => $request->input('website'),
                    'geo_polygon' => $request->input('geo_polygon'),
                    'entity_type' => 'App\Models\District',
                    'entity_id' => $district->id,
                    'polygon_centroid' => $request->input('polygon_centroid'),
                ]);

                return $district;
            });

            return new DistrictResource($district);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to create district and freguesia.pt entry: ' . $e->getMessage()], 500);
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
