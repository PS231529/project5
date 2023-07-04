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


Route::get('/exercises', [ExerciseController::class, 'indexWeb'])->name('exercises.index');
Route::get('/exercises/create', [ExerciseController::class, 'createWeb'])->name('exercises.create');
Route::post('/exercises', [ExerciseController::class, 'storeWeb'])->name('exercises.store');
Route::get('/exercises/{id}', [ExerciseController::class, 'showWeb'])->name('exercises.show');
Route::get('/exercises/{id}/edit', [ExerciseController::class, 'editWeb'])->name('exercises.edit');
Route::put('/exercises/{id}', [ExerciseController::class, 'updateWeb'])->name('exercises.update');
Route::delete('/exercises/{id}', [ExerciseController::class, 'destroyWeb'])->name('exercises.destroy'); 

Route::get('/exercises', [ExerciseController::class, 'indexWeb']);



