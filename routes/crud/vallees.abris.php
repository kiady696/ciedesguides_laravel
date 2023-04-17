<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('vallees/{vallee}/abris', App\Http\Controllers\ValleeAbriController::class, ["as" => "vallees",]);
    
});
