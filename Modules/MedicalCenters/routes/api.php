<?php

use Illuminate\Support\Facades\Route;
use Modules\MedicalCenters\Http\Controllers\MedicalCentersController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('medicalcenters', MedicalCentersController::class)->names('medicalcenters');
});
