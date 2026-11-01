<?php

use Illuminate\Support\Facades\Route;
use Modules\Locations\Http\Controllers\Api\V1\AreaController;
use Modules\Locations\Http\Controllers\Api\V1\GovernorateController;
use Modules\Specialties\Http\Controllers\Api\V1\SpecialtyController;
use Modules\Doctors\Http\Controllers\Api\V1\DoctorController;
use Modules\MedicalCenters\Http\Controllers\Api\V1\MedicalCenterController;
use Modules\Laboratories\Http\Controllers\Api\V1\LaboratoryController;

use Modules\Pharmacies\Http\Controllers\Api\V1\PharmacyController;
Route::prefix('v1')->group(function () {
    Route::get('/governorates', [GovernorateController::class, 'index']);
    Route::get('/governorates/{id}', [GovernorateController::class, 'show'])
        ->whereNumber('id');

    Route::get('/areas', [AreaController::class, 'index']);
    Route::get('/areas/{id}', [AreaController::class, 'show'])
        ->whereNumber('id');

          Route::get('/specialties', [SpecialtyController::class, 'index']);
    Route::get('/specialties/{id}', [SpecialtyController::class, 'show'])
        ->whereNumber('id');


           Route::get('/doctors', [DoctorController::class, 'index']);
    Route::get('/doctors/{id}', [DoctorController::class, 'show'])
        ->whereNumber('id');


            Route::get('/medical-centers', [MedicalCenterController::class, 'index']);
    Route::get('/medical-centers/{id}', [MedicalCenterController::class, 'show'])
        ->whereNumber('id');


            Route::get('/laboratories', [LaboratoryController::class, 'index']);
    Route::get('/laboratories/{id}', [LaboratoryController::class, 'show'])
    ->whereNumber('id');
        Route::get('/pharmacies', [PharmacyController::class, 'index']);
    Route::get('/pharmacies/{id}', [PharmacyController::class, 'show'])
        ->whereNumber('id');
});
