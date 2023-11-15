<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountyController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/county', [CountyController::class, 'index'])->name('county/index');
Route::get('/county/create', [CountyController::class, 'create'])->name('county/create');
Route::post('/counties', [CountyController::class, 'store'])->name('counties/store');
Route::get('/county/{county}/edit', [CountyController::class, 'edit'])->name('county/edit');
Route::put('/county/{county}', [CountyController::class, 'update'])->name('county/update');
Route::delete('/county/{county}', [CountyController::class, 'destroy'])->name('county/destroy');
Route::post('/county/filter', [CountyController::class, 'filter'])->name('county/filter');