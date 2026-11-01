<?php

use Illuminate\Support\Facades\Route;
use Modules\Pharmacies\Http\Controllers\PharmaciesController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('pharmacies', PharmaciesController::class)->names('pharmacies');
});
