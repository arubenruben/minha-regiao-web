<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    /** @use HasFactory<\Database\Factories\ElectionFactory> */
    use HasFactory;

    protected $fillable = [
        "year",
        "number_participant_voters",
        "number_registered_voters",
        "number_blank_votes",
        "number_null_votes",
        "number_absentee_votes",
        "freguesia_pt_entry_id",
    ];

    public function freguesiaPtEntry()
    {
        return $this->belongsTo(FreguesiaPTEntry::class, 'freguesia_pt_entry_id');
    }

    public function electionResults()
    {
        return $this->hasMany(ElectionResult::class);
    }

    // Create a method winner that analyzes the election results and returns the winner
    public function winner()
    {
        return $this->hasOne(ElectionResult::class)
            ->with(['party']) // eager load party
            ->orderByDesc('number_votes')
            ->limit(1); // this is crucial to make Eloquent treat it as 1:1
    }

    public function candidates()
    {
        return $this->hasManyThrough(Candidate::class, ElectionResult::class, 'election_id', 'election_result_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'freguesia_pt_entry_id', 'id')
            ->join('freguesia_pt_entries', function ($join) {
                $join->on('cities.id', '=', 'freguesia_pt_entries.entity_id')
                    ->where('freguesia_pt_entries.entity_type', City::class);
            });
    }

}
