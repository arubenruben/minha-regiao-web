<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreFreguesiaPTEntryRequest;
use App\Models\FreguesiaPTEntry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FreguesiaPTEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return FreguesiaPTEntry::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFreguesiaPTEntryRequest $request)
    {
        $freguesiaPTEntry = FreguesiaPTEntry::create($request->all());

        return response()->json($freguesiaPTEntry, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(FreguesiaPTEntry $freguesiaPTEntry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FreguesiaPTEntry $freguesiaPTEntry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FreguesiaPTEntry $freguesiaPTEntry)
    {
        //
    }
}
