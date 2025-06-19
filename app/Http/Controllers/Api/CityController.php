<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreCityRequest;
use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return City::all()->toResourceCollection();

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
    public function store(StoreCityRequest $request)
    {
        try {
            $city = DB::transaction(function () use ($request) {
                $city = City::create($request->all());

                $city->freguesiaPtEntry()->create($request->all() + [
                    'entity_type' => 'App\Models\City',
                    'entity_id' => $city->id,
                ]);

                return $city;
            });

            return new CityResource($city);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create city: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        return new CityResource($city);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        //
    }
}
