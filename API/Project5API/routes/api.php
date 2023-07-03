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

Route::get('/exercises', [ExerciseController::class, 'indexAPI']);
Route::post('/exercises', [ExerciseController::class, 'storeAPI']);
Route::get('/exercises/{id}', [ExerciseController::class, 'showAPI']);
Route::put('/exercises/{id}', [ExerciseController::class, 'updateAPI']);
Route::delete('/exercises/{id}', [ExerciseController::class, 'destroyAPI']);

Route::fallback(function () {
    return response()->json(['message' => 'Not Found'], 404);
});

Route::post('/register', [AuthenticationController::class, 'register']);

Route::post('/login', [AuthenticationController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {

// PROTECTED ROUTES

Route::get('profile', function(Request $request) { return auth()->user();});

Route::post('/logout', [AuthenticationController::class, 'logout']);

});