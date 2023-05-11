<?php

use App\Http\Controllers\TarefaController;
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

Route::prefix('/')->group(function () {
    Route::get('/', [TarefaController::class, 'index'])->name('index');
    Route::post('/', [TarefaController::class, 'store'])->name('store');
    Route::delete('/destroy/{id}', [TarefaController::class, 'destroy'])->name('destroy');
    Route::post('/finished/{id}', [TarefaController::class, 'finishedTask'])->name('finishedTask');
});
