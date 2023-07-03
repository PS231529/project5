<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index()
    {
        $exercises = Exercise::all();

        return response()->json([
            'data' => $exercises,
        ]);
    }

    public function store(Request $request)
    {
        // Validate the request data and create a new exercise
        $validatedData = $request->validate([
            'exercise_name' => 'required',
            'description' => 'required',
        ]);

        $exercise = Exercise::create($validatedData);

        return response()->json([
            'message' => 'Exercise created successfully',
            'data' => $exercise,
        ]);
    }

    public function show(Exercise $exercise)
    {
        return response()->json([
            'data' => $exercise,
        ]);
    }

    public function update(Request $request, Exercise $exercise)
    {
        // Validate the request data and update the exercise
        $validatedData = $request->validate([
            'exercise_name' => 'required',
            'description' => 'required',
        ]);

        $exercise->update($validatedData);

        return response()->json([
            'message' => 'Exercise updated successfully',
            'data' => $exercise,
        ]);
    }

    public function destroy(Exercise $exercise)
    {
        $exercise->delete();

        return response()->json([
            'message' => 'Exercise deleted successfully',
        ]);
    }
}