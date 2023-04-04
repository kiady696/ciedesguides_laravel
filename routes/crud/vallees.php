<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('vallees', App\Http\Controllers\ValleeController::class, []);
    
});
