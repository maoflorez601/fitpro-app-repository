<?php

namespace App\Http\Controllers;

use App\Models\HealthProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HealthProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $healthProfiles = HealthProfile::all();
        return view('health_profiles.index', compact('healthProfiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       // Lee el archivo JSON y decodifícalo a un array
       $diseasesJson = file_get_contents(resource_path('data/diseases.json'));
       $diseasesArray = json_decode($diseasesJson, true);

       // Asegúrate de que solo extraemos el array de enfermedades
       $diseases = $diseasesArray['diseases'];

       // Retorna la vista y pasa las enfermedades a ella
       return view('health_profiles.create', compact('diseases'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_email' => 'required|email',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'pathology' => 'nullable|string',
            'hearth_rate' => 'nullable|numeric',
            'systole' => 'nullable|numeric',
            'diastole' => 'nullable|numeric',
            'blood_oxygen' => 'nullable|numeric',
            'blood_glucose' => 'nullable|numeric',
        ]);

        HealthProfile::create($validatedData);

        return redirect()->route('health_profiles.index')
                         ->with('success', 'Perfil de Salud creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HealthProfile  $healthProfile
     * @return \Illuminate\Http\Response
     */
    public function show(HealthProfile $healthProfile)
    {
        return view('health_profiles.show', compact('healthProfile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HealthProfile  $healthProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(HealthProfile $healthProfile)
    {
        // Lee el archivo JSON y decodifícalo a un array
       $diseasesJson = file_get_contents(resource_path('data/diseases.json'));
       $diseasesArray = json_decode($diseasesJson, true);
       $diseases = $diseasesArray['diseases'];

        $selectedDiseases = explode(',', $healthProfile->pathology);
        return view('health_profiles.edit', compact('healthProfile','diseases','selectedDiseases'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HealthProfile  $healthProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HealthProfile $healthProfile)
    {
        $validatedData = $request->validate([
            'user_email' => 'required|email',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'pathology' => 'nullable|string',
            'hearth_rate' => 'nullable|numeric',
            'systole' => 'nullable|numeric',
            'diastole' => 'nullable|numeric',
            'blood_oxygen' => 'nullable|numeric',
            'blood_glucose' => 'nullable|numeric',
        ]);

        $healthProfile->update($validatedData);

        return redirect()->route('health_profiles.index')
                         ->with('success', 'Perfil de Salud actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HealthProfile  $healthProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(HealthProfile $healthProfile)
    {
        $healthProfile->delete();

        return redirect()->route('health_profiles.index')->with('success', 'Health Profile deleted successfully.');
    }
}
