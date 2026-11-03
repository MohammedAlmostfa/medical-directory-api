<?php

use Illuminate\Support\Facades\Route;
use Modules\MedicalCenters\Http\Controllers\MedicalCentersController;

Route::post('/medical-centers', [MedicalCenterController::class, 'store']);

Route::put('/medical-centers/{id}', [MedicalCenterController::class, 'update'])
    ->whereNumber('id');

Route::patch('/medical-centers/{id}', [MedicalCenterController::class, 'update'])
    ->whereNumber('id');

Route::delete('/medical-centers/{id}', [MedicalCenterController::class, 'destroy'])
    ->whereNumber('id');