@extends('layouts.app')

@section('content')

    <!-- Form to create a new exercise -->
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

    <!-- Container to display existing exercises -->
    <h2>Existing Exercises</h2>
    <div id="exerciseContainer">
        @foreach ($exercises as $exercise)
            <div class="exercise-card">
                <h3>{{ $exercise->exercise_name }}</h3>
                <p>{{ $exercise->description }}</p>
                <p>Created at: {{ $exercise->created_at }}</p>
                <p>Updated at: {{ $exercise->updated_at }}</p>
                <form class="deleteExerciseForm" action="{{ route('exercises.destroy', $exercise->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </div>
        @endforeach
    </div>

    <script>
        // Fetch exercises when the page loads
        document.addEventListener('DOMContentLoaded', () => {
            fetchExercises();
        });

        // Function to fetch exercises from the API and render them in the UI
        function fetchExercises() {
            fetch('{{ route('exercises.index') }}')
                .then(response => response.json())
                .then(data => {
                    const exerciseContainer = document.getElementById('exerciseContainer');
                    exerciseContainer.innerHTML = '';

                    data.data.forEach(exercise => {
                        const exerciseCard = document.createElement('div');
                        exerciseCard.className = 'exercise-card';
                        exerciseCard.innerHTML = `
                            <h3>${exercise.exercise_name}</h3>
                            <p>${exercise.description}</p>
                            <p>Created at: ${exercise.created_at}</p>
                            <p>Updated at: ${exercise.updated_at}</p>
                            <form class="deleteExerciseForm" action="/exercises/${exercise.id}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        `;
                        exerciseContainer.appendChild(exerciseCard);
                    });

                    // Attach event listeners to the delete exercise forms
                    const deleteExerciseForms = document.querySelectorAll('.deleteExerciseForm');
                    deleteExerciseForms.forEach(form => {
                        form.addEventListener('submit', deleteExercise);
                    });
                })
                .catch(error => {
                    console.error('Error fetching exercises:', error);
                });
        }

        // Function to handle exercise deletion
        function deleteExercise(event) {
            event.preventDefault();

            const form = event.target;
            const exerciseCard = form.parentElement;
            const exerciseId = form.getAttribute('action').split('/').pop();

            fetch(`/exercises/${exerciseId}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json'
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
