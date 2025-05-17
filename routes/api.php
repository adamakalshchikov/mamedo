<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\API\WorkoutController;

Route::apiResource('workouts', WorkoutController::class);