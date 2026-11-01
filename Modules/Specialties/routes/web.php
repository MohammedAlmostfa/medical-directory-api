<?php

use Illuminate\Support\Facades\Route;
use Modules\Specialties\Http\Controllers\SpecialtiesController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('specialties', SpecialtiesController::class)->names('specialties');
});
