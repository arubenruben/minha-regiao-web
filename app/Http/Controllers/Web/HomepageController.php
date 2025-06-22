<?php

namespace App\Http\Controllers\Web;

use App\Http\Resources\DistrictHomepageResource;
use App\Models\District;
use App\Models\FreguesiaPTEntry;
use Cache;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Election;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cacheKey = 'homepage_data';

        $data = Cache::remember($cacheKey, now()->addHour(), function () {
            // Get all elections with their cities and winners in one query
            $elections = Election::whereHas('city')
                ->with(['city', 'winner.party'])
                ->orderBy('year', 'desc')
                ->get();

            // Calculate both metrics in a single iteration
            $groupedElections = $elections->groupBy('year');

            $abstencion = [];
            $electionResults = [];

            foreach ($groupedElections as $year => $yearElections) {
                // Calculate abstention
                $totalAbstencion = $yearElections->sum(fn($e) => $e->number_registered_voters - $e->number_participant_voters);
                $totalRegistered = $yearElections->sum('number_registered_voters');
                $abstencion[$year] = ($totalAbstencion / $totalRegistered) * 100;

                // Calculate election winners
                $electionResults[$year] = $yearElections
                    ->pluck('winner.party.acronym')
                    ->filter()
                    ->countBy()
                    ->toArray();
            }

            return [
                'elections' => $electionResults,
                'abstencion' => $abstencion,
            ];
        });

        return Inertia::render('Homepage', [
            'regions' => FreguesiaPTEntry::all()->toResourceCollection(),
            'elections' => $data['elections'],
            'abstencion' => $data['abstencion'],
            'districts' => District::all()->toResourceCollection(DistrictHomepageResource::class),
        ]);
    }
}
