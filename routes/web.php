<?php

use App\Http\Controllers\Web\CityController;
use App\Http\Controllers\Web\ParishController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomepageController;
use App\Http\Controllers\Web\DistrictController;
#use App\Http\Controllers\Web\C

Route::get('/', [HomepageController::class, 'index']);
Route::get('/distrito/{district}', [DistrictController::class, 'show']);
Route::get('/cidade/{city}', [CityController::class, 'show']);
Route::get('/freguesia/{parish}', [ParishController::class, 'show']);

//require __DIR__.'/auth.php';
