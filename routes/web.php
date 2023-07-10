<?php

use App\Http\Controllers\EventoController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [EventoController::class, 'loadEventos'])->name('site.index');
Route::get('/eventos', [EventoController::class, 'create'])->name('evento.index');
Route::post('/eventos', [EventoController::class, 'store'])->name('evento.store');
