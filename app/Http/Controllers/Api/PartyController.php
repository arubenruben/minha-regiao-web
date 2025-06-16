<?php

namespace App\Http\Controllers\Api;

use App\Models\Party;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Party::all();
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
    public function store(Request $request)
    {
        $party = Party::create($request->all());

        return response()->json($party, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Party $party)
    {
        return response()->json($party, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Party $party)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Party $party)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Party $party)
    {
        //
    }
}
