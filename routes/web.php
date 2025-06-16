<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomepageController;
use App\Http\Controllers\Web\DistrictController;

Route::get('/', [HomepageController::class, 'index']);
Route::get('/distrito/{district}', [DistrictController::class, 'show']);

//require __DIR__.'/auth.php';
