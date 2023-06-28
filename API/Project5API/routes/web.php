<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ExerciseController;
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

Route::get('/', [ExerciseController::class, 'index'])->name('home');
Route::get('/exercises', [ExerciseController::class, 'index'])->name('exercises.index');
Route::post('/exercises', [ExerciseController::class, 'store'])->name('exercises.store');
Route::delete('/exercises/{id}', [ExerciseController::class, 'destroy'])->name('exercises.destroy');
