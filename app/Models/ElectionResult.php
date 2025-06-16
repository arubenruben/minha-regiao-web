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
        "election_id",
        "party_id",
    ];
}
