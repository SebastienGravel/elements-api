<?php

use App\Http\Controllers\Api\ElementsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('/v1/')->group(function () {
    Route::get('/', [ElementsController::class, 'all']);
    Route::get('/simple', [ElementsController::class, 'all']);
    Route::get('/nom/{name}', [ElementsController::class, 'getByName'])->where('name', '[A-Za-z0-9]+');
    Route::get('/symbole/{symbol}', [ElementsController::class, 'getBySymbol'])->where('symbol', '[A-Za-z0-9]+');
    Route::get('/numero/{id}', [ElementsController::class, 'getById'])->where('id', '[0-9]+');
    Route::get('/periode/{period}', [ElementsController::class, 'getByPeriod'])->where('period', '[0-9]+');
    Route::get('/groupe/{group}', [ElementsController::class, 'getByGroup'])->where('group', '[0-9]+');
    Route::get('/famille/{family}', [ElementsController::class, 'getByFamily'])->where('family', '[A-Za-z0-9\- ]+');
    Route::get('/etat/{state}', [ElementsController::class, 'getByState'])->where('state', '[A-Za-z0-9]+');
});
