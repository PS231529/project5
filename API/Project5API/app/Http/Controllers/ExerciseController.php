<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
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

    // Add other controller methods as needed
}
