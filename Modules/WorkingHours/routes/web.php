<?php

use Illuminate\Support\Facades\Route;
use Modules\WorkingHours\Http\Controllers\WorkingHoursController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('workinghours', WorkingHoursController::class)->names('workinghours');
});
