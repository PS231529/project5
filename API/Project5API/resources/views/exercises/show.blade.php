@extends('layouts.app')

@section('content')
    <h2>Exercise Details</h2>

    <div class="exercise-details">
        <p><strong>Exercise Name:</strong> {{ $exercise->exercise_name }}</p>
        <p><strong>Description:</strong> {{ $exercise->description }}</p>
        <p><strong>Created at:</strong> {{ $exercise->created_at }}</p>
        <p><strong>Updated at:</strong> {{ $exercise->updated_at }}</p>
    </div>
@endsection
