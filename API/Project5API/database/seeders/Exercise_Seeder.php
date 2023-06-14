<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Exercise;

class Exercise_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() {

    $exercises = [
        ['exercise_name' => 'Squat', 'description' => 'd',],
        ['exercise_name' => 'Push-up', 'description' => 'd',],
        ['exercise_name' => 'Dip', 'description' => 'd',],
        ['exercise_name' => 'Plank', 'description' => '',],
        ['exercise_name' => 'Paardentrap', 'description' => 'd',],
        ['exercise_name' => 'Mountain climber', 'description' => 'd',],
        ['exercise_name' => 'Burpee', 'description' => 'd',],
        ['exercise_name' => 'Lunge', 'description' => 'd',],
        ['exercise_name' => 'Wall sit', 'description' => 'd',],
        ['exercise_name' => 'Crunch', 'description' => 'd',]
    ];

    foreach ($exercises as $exercise) {
        Exercise::create($exercise);
    }
    }
}
