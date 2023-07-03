@extends('layouts.app')

@section('content')
    <h2>Create Exercise</h2>

    <form id="createExerciseForm" action="{{ route('exercises.store') }}" method="POST">
        @csrf
        <label for="exerciseName">Exercise Name:</label>
        <input type="text" id="exerciseName" name="exercise_name" required>
        <br>
        <label for="exerciseDescription">Exercise Description:</label>
        <input type="text" id="exerciseDescription" name="description" required>
        <br>
        <button type="submit">Create Exercise</button>
    </form>
@endsection
