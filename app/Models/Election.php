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
        return $this->electionResults()
            ->orderBy('number_votes', 'desc')
            ->with('party')
            ->with('candidate')
            ->first();
    }

    public function candidates()
    {
        return $this->hasManyThrough(Candidate::class, ElectionResult::class, 'election_id', 'election_result_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'freguesia_pt_entry_id', 'id')
            ->join('freguesias_pt_entries', function ($join) {
                $join->on('cities.id', '=', 'freguesias_pt_entries.entity_id')
                    ->where('freguesias_pt_entries.entity_type', City::class);
            });
    }

}
