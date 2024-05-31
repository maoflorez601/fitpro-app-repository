<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExerciseRoutine;

class ExerciseRoutineController extends Controller
{
    public function index()
    {
        $exerciseRoutines = ExerciseRoutine::all();
        return view('exercise_routines.index', compact('exerciseRoutines'));
    }

    public function create()
    {
        return view('exercise_routines.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'calories_burned' => 'required|integer',
            'repetitions' => 'required|integer',
            'sets' => 'required|integer',
            'duration' => 'required|integer',
        ]);

        ExerciseRoutine::create($request->all());

        return redirect()->route('exercise_routines.index')->with('success', 'Rutina de ejercicio creada con éxito');
    }

    public function show(ExerciseRoutine $exerciseRoutine)
    {
        return view('exercise_routines.show', compact('exerciseRoutine'));
    }

    public function edit(ExerciseRoutine $exerciseRoutine)
    {
        return view('exercise_routines.edit', compact('exerciseRoutine'));
    }

    public function update(Request $request, ExerciseRoutine $exerciseRoutine)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'calories_burned' => 'required|integer',
            'repetitions' => 'required|integer',
            'sets' => 'required|integer',
            'duration' => 'required|integer',
        ]);

        $exerciseRoutine->update($request->all());

        return redirect()->route('exercise_routines.index')->with('success', 'Rutina de ejercicio actualizada con éxito');
    }

    public function destroy(ExerciseRoutine $exerciseRoutine)
    {
        $exerciseRoutine->delete();

        return redirect()->route('exercise_routines.index')->with('success', 'Rutina de ejercicio eliminada con éxito');
    }
}
