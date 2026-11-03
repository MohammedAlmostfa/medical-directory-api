<?php

use Illuminate\Support\Facades\Route;
use Modules\Specialties\Http\Controllers\SpecialtiesController;

Route::post('/specialties', [SpecialtyController::class, 'store']);
Route::put('/specialties/{id}', [SpecialtyController::class, 'update'])
    ->whereNumber('id');
Route::patch('/specialties/{id}', [SpecialtyController::class, 'update'])
    ->whereNumber('id');
Route::delete('/specialties/{id}', [SpecialtyController::class, 'destroy'])
    ->whereNumber('id');