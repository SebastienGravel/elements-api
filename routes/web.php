<?php

use App\Http\Controllers\ElementsController;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\ElementCollection;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ElementsController::class, 'index']);
Route::get('/elements-api', [ElementsController::class, 'download']);
