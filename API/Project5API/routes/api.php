<?php

use App\Http\Controllers\ExerciseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SummamoveController;
use App\Models\Exercise;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::get('/exercises', [ExerciseController::class, 'getExercises']);

Route::get('/exercises/{id}', [ExerciseController::class, 'show']);

Route::post('/exercises', [ExerciseController::class, 'store']);




Route::fallback(function () {
    return response()->json(['message' => 'Not Found'], 404);
});

