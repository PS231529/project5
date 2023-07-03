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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/exercises', [ExerciseController::class, 'index'])->name('exercises.index');
Route::get('/exercises/create', [ExerciseController::class, 'create'])->name('exercises.create');
Route::post('/exercises', [ExerciseController::class, 'store'])->name('exercises.store');
Route::get('/exercises/{exercise}', [ExerciseController::class, 'show'])->name('exercises.show');
Route::get('/exercises/{exercise}/edit', [ExerciseController::class, 'edit'])->name('exercises.edit');
Route::put('/exercises/{exercise}', [ExerciseController::class, 'update'])->name('exercises.update');
Route::delete('/exercises/{exercise}', [ExerciseController::class, 'destroy'])->name('exercises.destroy');
