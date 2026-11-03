<?php

use Illuminate\Support\Facades\Route;
use Modules\Doctors\Http\Controllers\DoctorsController;
Route::post('/doctors', [DoctorController::class, 'store']);

Route::put('/doctors/{id}', [DoctorController::class, 'update'])
    ->whereNumber('id');

Route::patch('/doctors/{id}', [DoctorController::class, 'update'])
    ->whereNumber('id');

Route::delete('/doctors/{id}', [DoctorController::class, 'destroy'])
    ->whereNumber('id');