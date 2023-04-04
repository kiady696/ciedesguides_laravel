<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('abris', App\Http\Controllers\AbriController::class, []);
    
});
