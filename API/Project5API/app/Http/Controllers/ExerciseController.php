<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{

    public function getExercises() {
        $Exercises = Exercise::all();
        return response()->json($Exercises);
    }

    
    public function show(Request $request, $id)
    {
        $Exercise = Exercise::find($id);

        if ($Exercise) {
            return response()->json($Exercise);
        } else {
            return response()->json(['message' => 'Resource not found'], 404);
        }
    }
    public function index()
    {
        $exercises = Exercise::orderBy('created_at', 'desc')->get();
    
        return view('home', compact('exercises'));
    }
    

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'exercise_name' => 'required',
            'description' => 'required',
        ]);
    
        $exercise = Exercise::create($validatedData);
    
        return redirect()->route('exercises.index')->with('success', 'Exercise created successfully');
    }

    public function destroy($id)
    {
        $exercise = Exercise::findOrFail($id);
        $exercise->delete();

        return redirect()->route('exercises.index')->with('success', 'Exercise deleted successfully');
    }
}
