<?php

use Illuminate\Support\Facades\Route;
use Modules\Pharmacies\Http\Controllers\PharmaciesController;

Route::post('/pharmacies', [PharmacyController::class, 'store']);

Route::put('/pharmacies/{id}', [PharmacyController::class, 'update'])
    ->whereNumber('id');

Route::patch('/pharmacies/{id}', [PharmacyController::class, 'update'])
    ->whereNumber('id');

Route::delete('/pharmacies/{id}', [PharmacyController::class, 'destroy'])
    ->whereNumber('id');