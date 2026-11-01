<?php

use Illuminate\Support\Facades\Route;
use Modules\WorkingHours\Http\Controllers\WorkingHoursController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('workinghours', WorkingHoursController::class)->names('workinghours');
});
