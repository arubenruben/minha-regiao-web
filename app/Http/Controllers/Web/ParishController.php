<?php

namespace App\Http\Controllers\Web;

use App\Models\Parish;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;

class ParishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $parish = Parish::whereHas('freguesiaPtEntry', function ($query) use ($request) {
            $query->where('freguesias_pt_entries.id', $request->freguesias_pt_entry_id);
        })->firstOrFail();

        return Inertia::render('Parish', [
            'parish' => $parish->toResource(),
        ]);
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
