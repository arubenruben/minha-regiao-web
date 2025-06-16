<?php

use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\Api\ParishController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CityController;

#Route::apiResource("freguesia_pt_entries", FreguesiaPTEntryController::class);
Route::apiResource("cities", CityController::class);
Route::apiResource("districts", DistrictController::class);
Route::apiResource("parishes", ParishController::class);