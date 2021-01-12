<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArbolController;

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

Route::get('/', [ArbolController::class, 'index'])->name('arbol.index');
Route::post('/crear', [ArbolController::class, 'store'])->name('arbol.store');
Route::delete('/borrar/{arbol}', [ArbolController::class, 'delete'])->name('arbol.delete');
Route::put('/actualizar/{arbol}', [ArbolController::class, 'update'])->name('arbol.update');
Route::get('/{arbol}', [ArbolController::class, 'details'])->name('arbol.detail');

