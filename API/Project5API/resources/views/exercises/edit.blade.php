@extends('layouts.app')

@section('content')
    <h2>Edit Exercise</h2>

    <form id="editExerciseForm" action="{{ route('exercises.update', $exercise->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="exerciseName">Exercise Name:</label>
        <input type="text" id="exerciseName" name="exercise_name" value="{{ $exercise->exercise_name }}" required>
        <br>
        <label for="exerciseDescription">Exercise Description:</label>
        <input type="text" id="exerciseDescription" name="description" value="{{ $exercise->description }}" required>
        <br>
        <button type="submit">Update Exercise</button>
    </form>
@endsection
