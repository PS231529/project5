@extends('layouts.app')

@section('content')
    <h2>Existing Exercises</h2>

    <div id="exerciseContainer">
        @foreach ($exercises as $exercise)
            <div class="exercise-card">
                <h3>{{ $exercise->exercise_name }}</h3>
                <p>{{ $exercise->description }}</p>
                <p>Created at: {{ $exercise->created_at }}</p>
                <p>Updated at: {{ $exercise->updated_at }}</p>
                <form class="deleteExerciseForm" action="{{ route('exercises.destroy', ['exercise' => $exercise]) }}" method="POST">

                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </div>
        @endforeach
    </div>

    <script>
        // Attach event listeners to the delete exercise forms
        const deleteExerciseForms = document.querySelectorAll('.deleteExerciseForm');
        deleteExerciseForms.forEach(form => {
            form.addEventListener('submit', deleteExercise);
        });

        // Function to handle exercise deletion
        function deleteExercise(event) {
            event.preventDefault();

            const form = event.target;
            const exerciseCard = form.parentElement;
            const exerciseId = form.getAttribute('action').split('/').pop();

            fetch(`/exercises/${exerciseId}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add the CSRF token here
                }
            })
                .then(response => response.json())
                .then(data => {
                    console.log('Exercise deleted:', data);
                    exerciseCard.remove();
                })
                .catch(error => {
                    console.error('Error deleting exercise:', error);
                });
        }
    </script>
@endsection
