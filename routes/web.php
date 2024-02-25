<?php
use App\Http\Controllers\CineController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [CineController::class, 'index'])->name('Cine.index');
Route::get('/funciones', [CineController::class, 'sala'])->name('Cine.sala');

Route::post('/store', [CineController::class, 'store'])->name('Cine.store');
Route::post('/agregar', [CineController::class, 'agregar'])->name('Cine.agregar');  