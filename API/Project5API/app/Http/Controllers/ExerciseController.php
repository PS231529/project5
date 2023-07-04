<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;
class ExerciseController extends Controller
{

    // API context
    public function indexAPI()
    {
        $exercises = Exercise::all();

        return $exercises;
    }

    public function storeAPI(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'exercise_name' => 'required',
            'description' => 'required',
        ]);

        // Create a new exercise
        $exercise = Exercise::create($validatedData);

        return response()->json([
            'message' => 'Exercise created successfully',
            'data' => $exercise,
        ], 201);
    }

    public function showAPI($id)
    {
        $exercise = Exercise::findOrFail($id);

        return response()->json([
            'data' => $exercise,
        ]);
    }

    public function updateAPI(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'exercise_name' => 'required',
            'description' => 'required',
        ]);

        $exercise = Exercise::findOrFail($id);
        $exercise->update($validatedData);

        return response()->json([
            'message' => 'Exercise updated successfully',
            'data' => $exercise,
        ]);
    }

    public function destroyAPI($id)
    {
        $exercise = Exercise::findOrFail($id);
        $exercise->delete();

        return response()->json([
            'message' => 'Exercise deleted successfully',
        ]);
    }

    // Web context
    public function indexWeb()
    {
        $exercises = Exercise::all();

        return view('exercises.index', compact('exercises'));
    }

    public function createWeb()
    {
        return view('exercises.create');
    }

    public function storeWeb(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'exercise_name' => 'required',
            'description' => 'required',
        ]);

        // Create a new exercise
        $exercise = Exercise::create($validatedData);

        return redirect()->route('exercises.index')->with('success', 'Exercise created successfully');
    }

    public function showWeb($id)
    {
        $exercise = Exercise::findOrFail($id);

        return view('exercises.show', compact('exercise'));
    }

    public function editWeb($id)
    {
        $exercise = Exercise::findOrFail($id);

        return view('exercises.edit', compact('exercise'));
    }

    public function updateWeb(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'exercise_name' => 'required',
            'description' => 'required',
        ]);

        $exercise = Exercise::findOrFail($id);
        $exercise->update($validatedData);

        return redirect()->route('exercises.show', $exercise->id)->with('success', 'Exercise updated successfully');
    }

    public function destroyWeb($id)
    {
        $exercise = Exercise::findOrFail($id);
        $exercise->delete();

        return redirect()->route('exercises.index')->with('success', 'Exercise deleted successfully');
    }
}