<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreWikipediaRequest;
use App\Models\Wikipedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WikipediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Wikipedia::all();
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
    public function store(StoreWikipediaRequest $request)
    {
        $wikipedia = Wikipedia::create($request->all());

        return response()->json($wikipedia, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Wikipedia $wikipedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wikipedia $wikipedia)
    {
        return response()->json($wikipedia);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wikipedia $wikipedia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wikipedia $wikipedia)
    {
        //
    }
}
