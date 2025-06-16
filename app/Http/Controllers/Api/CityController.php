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
        DB::transaction(function () use ($request) {

            $city = City::create($request->all());

            $city->freguesiaPtEntry()->create([
                'name' => $request->input('name'),
                'freguesias_pt_url' => $request->input('freguesias_pt_url'),
                'freguesias_pt_id' => $request->input('freguesias_pt_id'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'website' => $request->input('website'),
                'geo_polygon' => $request->input('geo_polygon'),
                'polygon_centroid' => $request->input('polygon_centroid'),
            ]);

            return CityResource::make($city);

        });

        # Raise an exception if the transaction fails
        throw_if(
            DB::transactionLevel() > 0,
            new \Exception('Failed to create city and freguesia.pt entry.')
        );
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
