<?php

use Illuminate\Support\Facades\Route;
use Modules\Specialties\Http\Controllers\SpecialtiesController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('specialties', SpecialtiesController::class)->names('specialties');
});
