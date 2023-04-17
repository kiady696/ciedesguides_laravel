<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('sommets', App\Http\Controllers\SommetController::class, []);
    
});
