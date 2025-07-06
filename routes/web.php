<?php

use App\Http\Controllers\Web\AboutUsController;
use App\Http\Controllers\Web\CityController;
use App\Http\Controllers\Web\ParishController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomepageController;
use App\Http\Controllers\Web\DistrictController;
use App\Http\Controllers\Web\ElectionController;
use App\Http\Controllers\Web\ContactUsController;

Route::get('/', [HomepageController::class, 'index'])->name('home');
Route::get('/distrito/{district}', [DistrictController::class, 'show'])->name('districts.show');
Route::get('/cidade/{city}', [CityController::class, 'show'])->name('cities.show');
Route::get('/freguesia/{freguesias_pt_entry_id}', [ParishController::class, 'show'])->name('parishes.show');
Route::get('/eleicoes/{election_id}', [ElectionController::class, 'show'])->name('elections.show');
Route::get('/sobre', [AboutUsController::class, 'index'])->name('about-us');
Route::get('/contacto', [ContactUsController::class, 'index'])->name('contact-us');


//require __DIR__.'/auth.php';
