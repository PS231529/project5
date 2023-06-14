<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Achievement;
use Illuminate\Http\Request;

class SummamoveController extends Controller
{
    public function getExercises() {
        $Exercises = Exercise::all();
        return response()->json($Exercises);
    }
    
    public function getAchievements() {
        $Achievements = Achievement::all();
        return response()->json($Achievements);
    }
    
}
