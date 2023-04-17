<?php

use App\Http\Controllers\AbrisController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['customAuth'])->group(function () {
    Route::resource('vallees', App\Http\Controllers\ValleeController::class, []);
    Route::resource('vallees/{vallee}/abris', App\Http\Controllers\ValleeAbriController::class, ["as" => "vallees",]);
    Route::resource('guides', App\Http\Controllers\GuideController::class, []);
});

