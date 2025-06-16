<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wikipedia extends Model
{
    /** @use HasFactory<\Database\Factories\WikipediaFactory> */
    use HasFactory;
    protected $table = 'wikipedia';

    protected $fillable = [
        'title',
        'url',
        'summary',
        'freguesia_pt_entry_id',
    ];

    public function freguesiaPtEntry()
    {
        return $this->belongsTo(FreguesiaPtEntry::class, 'freguesia_pt_entry_id');
    }

}
