<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectionResult extends Model
{
    /** @use HasFactory<\Database\Factories\ElectionResultFactory> */
    use HasFactory;

    protected $fillable = [
        "number_votes",
        "percentage_votes",
        "election_id",
        "party_id",
    ];

    public function election()
    {
        return $this->belongsTo(Election::class);
    }

    public function party()
    {
        return $this->belongsTo(Party::class);
    }

    public function candidates()
    {
        return $this->hasMany(Candidate::class, "election_result_id");
    }
}
