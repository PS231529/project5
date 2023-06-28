<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SummamoveController;

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



Route::get('/exercises', 'App\Http\Controllers\SummamoveController@index');
Route::post('/exercises', [SummamoveController::class, 'store'])->name('exercises.store');
Route::get('/exercises/{id}', 'App\Http\Controllers\SummamoveController@show');
Route::put('/exercises/{id}', 'App\Http\Controllers\SummamoveController@update');
Route::delete('/exercises/{id}', 'App\Http\Controllers\SummamoveController@destroy');




Route::fallback(function () {
    return response()->json(['message' => 'Not Found'], 404);
});

