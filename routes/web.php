<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HealthProfileController;
use App\Http\Controllers\ExerciseRoutineController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Agregar entidad rutas
    Route::resource('foods', FoodController::class);
    Route::resource('health_profiles', HealthProfileController::class);
    Route::resource('exercise_routines', ExerciseRoutineController::class);
});
