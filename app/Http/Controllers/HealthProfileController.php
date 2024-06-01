<?php

namespace App\Http\Controllers;

use App\Models\HealthProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HealthProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $healthProfiles = HealthProfile::all();
        return view('health-profiles.index', compact('healthProfiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('health-profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info("Alcanza el método store");
        

        // Depuración
        try {
            //validate fields
            $request->validate([
                'pathology_group' => 'required|string|min:2|max:100',
                'pathology' => 'required|string|min:2|max:100',
                'hearth_rate' => 'required|numeric',
                'systole' => 'required|numeric',
                'diastole' => 'required|numeric',
                'blood_oxygen' => 'required|numeric',
                'blood_glucose' => 'required|numeric',
            ]);

            HealthProfile::create($request->all());
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return redirect()->route('healthProfiles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
