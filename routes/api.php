<?php

use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\Api\ParishController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\PartyController;
use App\Http\Controllers\Api\ElectionController;
use App\Http\Controllers\Api\ElectionResultController;
use App\Http\Controllers\Api\WikipediaController;
use App\Http\Controllers\Api\CandidateController;

#Route::apiResource("freguesia_pt_entries", FreguesiaPTEntryController::class);
Route::apiResource("cities", CityController::class);
Route::apiResource("districts", DistrictController::class);
Route::apiResource("parishes", ParishController::class);
Route::apiResource("parties", PartyController::class);
Route::apiResource("elections", ElectionController::class);
Route::apiResource("election_results", ElectionResultController::class);
Route::apiResource("wikipedia", WikipediaController::class);
Route::apiResource("candidates", CandidateController::class);