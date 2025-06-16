<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    /** @use HasFactory<\Database\Factories\CandidateFactory> */
    use HasFactory;

    protected $fillable = [
        "name",
        "election_result_id",
    ];

    public function electionResult()
    {
        return $this->belongsTo(ElectionResult::class, "election_result_id");
    }

}
