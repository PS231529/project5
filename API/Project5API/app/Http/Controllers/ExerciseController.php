<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index()
    {
        $exercises = Exercise::all();

        return view('exercises.index', compact('exercises'));
    }

    public function create()
    {
        return view('exercises.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'exercise_name' => 'required',
            'description' => 'required',
        ]);

        Exercise::create($validatedData);

        return redirect()->route('exercises.index');
    }

    public function show(Exercise $exercise)
    {
        return view('exercises.show', compact('exercise'));
    }

    public function edit(Exercise $exercise)
    {
        return view('exercises.edit', compact('exercise'));
    }

    public function update(Request $request, Exercise $exercise)
    {
        $validatedData = $request->validate([
            'exercise_name' => 'required',
            'description' => 'required',
        ]);

        $exercise->update($validatedData);

        return redirect()->route('exercises.index');
    }

    public function destroy(Exercise $exercise)
    {
        $exercise->delete();

        return redirect()->route('exercises.index');
    }
}
