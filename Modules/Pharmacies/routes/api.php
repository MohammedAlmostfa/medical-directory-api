<?php

use Illuminate\Support\Facades\Route;
use Modules\Pharmacies\Http\Controllers\PharmaciesController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('pharmacies', PharmaciesController::class)->names('pharmacies');
});
