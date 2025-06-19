<?php

namespace App\Http\Controllers\Web;

use App\Http\Resources\DistrictHomepageResource;
use App\Models\District;
use App\Models\FreguesiaPTEntry;
use Cache;
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
        $districts = District::with('freguesiaPtEntry')->get();

        if (Cache::has("elections") && Cache::has("abstencion")) {
            $elections = Cache::get("elections");
            $abstencion = Cache::get("abstencion");

        } else {
            $electionSummary = [];
            $abstencionSummary = [];

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
                    ->map(fn($election) => $election->number_registered_voters > 0 ? 100 - $election->number_participant_voters / $election->number_registered_voters * 100 : 100)
                    ->avg();
            }

            Cache::put('abstencion', $abstencionSummary);
            Cache::put('elections', $electionSummary);
            $elections = $electionSummary;
            $abstencion = $abstencionSummary;
        }

        return Inertia::render('Homepage', [
            'regions' => FreguesiaPTEntry::all()->toResourceCollection(),
            'elections' => $elections,
            'abstencion' => $abstencion,
            'districts' => $districts->toResourceCollection(DistrictHomepageResource::class),
        ]);
    }

}
