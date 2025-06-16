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
        return $this->belongsTo(FreguesiaPTEntry::class);
    }

    public function electionResults()
    {
        return $this->hasMany(ElectionResult::class);
    }

    #public function president()
    #{
    #    return $this->belongsTo(User::class, 'president_id');
    #}

}
