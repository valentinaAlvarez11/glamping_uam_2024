<?php

namespace App\Http\Controllers;

use App\Models\CabinLevel;
use Illuminate\Http\Request;

class CabinLevelController extends Controller
{
    public function index()
    {
        $cabinLevels = CabinLevel::all();
        return response()->json($cabinLevels);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:cabin_levels,name|max:50',
            'description' => 'nullable|string',
            'color' => 'nullable|string|size:6',
        ]);

        $cabinLevel = CabinLevel::create($validated);
        return response()->json($cabinLevel, 201);
    }

    public function show(CabinLevel $cabinLevel)
    {
        return response()->json($cabinLevel);
    }

    public function update(Request $request, CabinLevel $cabinLevel)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:cabin_levels,name,' . $cabinLevel->id . '|max:50',
            'description' => 'nullable|string',
            'color' => 'nullable|string|size:6',
        ]);
        $cabinLevel->update($validated);

        return response()->json($cabinLevel, 200);
    }
    
    public function destroy(CabinLevel $cabinLevel)
    {
        $cabinLevel->delete();
        return response()->json(['message' => 'Nivel de cabaña eliminado'], 200);
    }
}
