<?php

use Illuminate\Support\Facades\Route;
use Modules\Laboratories\Http\Controllers\LaboratoriesController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('laboratories', LaboratoriesController::class)->names('laboratories');
});
