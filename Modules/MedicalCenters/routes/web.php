<?php

use Illuminate\Support\Facades\Route;
use Modules\MedicalCenters\Http\Controllers\MedicalCentersController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('medicalcenters', MedicalCentersController::class)->names('medicalcenters');
});
