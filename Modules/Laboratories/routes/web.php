<?php

use Illuminate\Support\Facades\Route;
use Modules\Laboratories\Http\Controllers\LaboratoriesController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('laboratories', LaboratoriesController::class)->names('laboratories');
});
