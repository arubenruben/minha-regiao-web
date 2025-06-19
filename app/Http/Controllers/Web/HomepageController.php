<?php

namespace App\Http\Controllers\Web;

use App\Http\Resources\DistrictHomepageResource;
use App\Http\Resources\ElectionSummaryResource;
use App\Models\District;
use App\Models\Election;
use App\Models\FreguesiaPTEntry;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Clickbar\Magellan\Database\PostgisFunctions\ST;
use Illuminate\Support\Facades\DB;

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
        $abstencionSummary = [];

        foreach ($results as $year => $elections) {
            $electionSummary[(string) $year] = $elections
                ->map(fn($election) => $election->winner()?->party->acronym)
                ->filter()
                ->countBy()
                ->toArray();

            # Abstencion is sum of election->number_participant_voters / election->number_registered_voters * 100
            $abstencionSummary[(string) $year] = $elections
                ->map(fn($election) => $election->number_registered_voters > 0 ? $election->number_participant_voters / $election->number_registered_voters * 100 : 0)
                ->avg();
        }

        $districts = District::with('freguesiaPtEntry')->get()->map(fn($district) => [
            'id' => $district->id,
            'name' => $district->freguesiaPtEntry->name,
            #'geo_polygon' => ST::simplifyPolygonHull($district->freguesiaPtEntry->geo_polygon, 0.1), // Simplify the geo_polygon for better performance                
            #'geo_polygon' => $district->freguesiaPtEntry->geo_polygon   
            'geo_polygon' => json_decode(DB::table('freguesias_pt_entries')
                ->selectRaw('ST_AsGeoJSON(ST_SimplifyPreserveTopology(geo_polygon, ?)) as geojson', [0.001])
                ->where('id', $district->id)
                ->first()->geojson, true)
        ]);

        return Inertia::render('Homepage', [
            'regions' => FreguesiaPTEntry::all()->toResourceCollection(),
            'elections' => $electionSummary,
            'abstencion' => $abstencionSummary,
            'districts' => $districts,
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
