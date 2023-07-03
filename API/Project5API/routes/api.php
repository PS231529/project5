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



Route::get('/exercises', [ExerciseController::class, 'index']);
Route::post('/exercises', [ExerciseController::class, 'store']);
Route::get('/exercises/{exercise}', [ExerciseController::class, 'show']);
Route::put('/exercises/{exercise}', [ExerciseController::class, 'update']);
Route::delete('/exercises/{exercise}', [ExerciseController::class, 'destroy']);

Route::fallback(function () {
    return response()->json(['message' => 'Not Found'], 404);
});

