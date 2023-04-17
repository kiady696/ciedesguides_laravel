<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('guides', App\Http\Controllers\GuideController::class, []);
    
});
