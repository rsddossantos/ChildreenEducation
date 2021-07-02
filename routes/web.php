<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'list']);
Route::get('/list/{idChild}', [HomeController::class, 'list']);
Route::get('/addPoints/{id}/{idChild}', [HomeController::class, 'addPoints']);
Route::get('/clearPunish/{id}/{punish}', [HomeController::class, 'clearPunish']);

