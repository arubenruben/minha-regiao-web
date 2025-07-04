<?php

use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\Api\ParishController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\PartyController;
use App\Http\Controllers\Api\ElectionController;
use App\Http\Controllers\Api\ElectionResultController;
use App\Http\Controllers\Api\CandidateController;

#Route::apiResource("freguesia_pt_entries", FreguesiaPTEntryController::class);
Route::apiResource("cities", CityController::class, ['as' => 'api']);
Route::apiResource("districts", DistrictController::class, ['as' => 'api']);
Route::apiResource("parishes", ParishController::class, ['as' => 'api']);
Route::apiResource("parties", PartyController::class, ['as' => 'api']);
Route::apiResource("elections", ElectionController::class, ['as' => 'api']);
Route::apiResource("election_results", ElectionResultController::class, ['as' => 'api']);
Route::apiResource("candidates", CandidateController::class, ['as' => 'api']);