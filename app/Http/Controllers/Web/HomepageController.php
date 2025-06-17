<?php

namespace App\Http\Controllers\Web;

use App\Http\Resources\ElectionSummaryResource;
use App\Models\Election;
use App\Models\FreguesiaPTEntry;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $elections = Election::all();
        $results = $elections->groupBy('year')->sortKeys();

        $electionSummary = [];

        foreach ($results as $year => $elections) {
            $electionSummary[(string) $year] = $elections
                ->map(fn($election) => $election->winner()?->party->acronym)
                ->filter()
                ->countBy()
                ->toArray();
        }

        return Inertia::render('Homepage', [
            'regions' => FreguesiaPTEntry::all()->toResourceCollection(),
            'elections' => $electionSummary,
            'districts' => FreguesiaPTEntry::where('entity_type', 'district')->get(),
        ]);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
