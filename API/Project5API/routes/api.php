<?php

use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\AuthenticationController;
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
Route::post('login', [AuthenticationController::class, 'login']);
Route::post('logout', [AuthenticationController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/register', [AuthenticationController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/exercises', [ExerciseController::class, 'indexAPI']);
    Route::post('/exercises', [ExerciseController::class, 'storeAPI']);
    Route::get('/exercises/{id}', [ExerciseController::class, 'showAPI']);
    Route::put('/exercises/{id}', [ExerciseController::class, 'updateAPI']);
    Route::delete('/exercises/{id}', [ExerciseController::class, 'destroyAPI']);
});