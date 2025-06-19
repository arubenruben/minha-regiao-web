<?php

namespace App\Http\Controllers\Web;

use App\Http\Resources\DistrictHomepageResource;
use App\Models\District;
use App\Models\Election;
use App\Models\FreguesiaPTEntry;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $electionSummary = [];
        $abstencionSummary = [];
        $districts = District::with('freguesiaPtEntry')->get();

        $results = [];

        foreach ($districts as $district) {
            foreach ($district->cities as $city) {
                foreach ($city->elections as $election) {
                    if (!isset($results[$election->year])) {
                        $results[$election->year] = [];
                    }
                    $results[$election->year][] = $election;
                }
            }
        }

        foreach ($results as $year => $elections) {
            $electionSummary[(string) $year] = collect($elections)
                ->map(fn($election) => $election->winner()?->party->acronym)
                ->filter()
                ->countBy()
                ->toArray();
            
            $abstencionSummary[(string) $year] = collect($elections)
                ->map(fn($election) => $election->number_registered_voters > 0 ? 100 - ($election->number_participant_voters / $election->number_registered_voters * 100) : 100)
                ->avg();
        }

        return Inertia::render('Homepage', [
            'regions' => FreguesiaPTEntry::all()->toResourceCollection(),
            'elections' => $electionSummary,
            'abstencion' => $abstencionSummary,
            'districts' => $districts->toResourceCollection(DistrictHomepageResource::class),
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
