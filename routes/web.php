<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomepageController;

Route::get('/', [HomepageController::class, 'index']);

//require __DIR__.'/auth.php';
