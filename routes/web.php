<?php

use App\Http\Controllers\testController;
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

Route::get('/', [testController::class, 'index'])->name('table');
Route::put('/', [testController::class, 'update'])->name('update');
Route::post('/', [testController::class, 'insert'])->name('insert');
Route::get('/{id}', [testController::class, 'delete'])->name('delete');
