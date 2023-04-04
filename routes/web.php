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

Route::resources([
    'abris', AbrisController::class,
    'guides', GuidesController::class,
    'sommets', SommetsController::class,
    'vallees', ValleesController::class,
    'ascensions', AscensionsController::class,
    'randonnees', RandonneesController::class,
]);

