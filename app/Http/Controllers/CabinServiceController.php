<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CabinService;

class CabinServiceController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'service_id' => 'required|exists:services,id',
            'cabin_id' => 'required|exists:cabins,id',
        ]);

        $cabinService = CabinService::create([
            'name' => $request->name,
            'service_id' => $request->service_id,
            'cabin_id' => $request->cabin_id,
        ]);

        return response()->json($cabinService, 201);
    }

    public function index()
    {
        $cabinServices = CabinService::all();
        return response()->json($cabinServices);
    }

    public function show($id)
    {
        $cabinService = CabinService::findOrFail($id);
        return response()->json($cabinService);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'service_id' => 'required|exists:services,id',
            'cabin_id' => 'required|exists:cabins,id',
        ]);

        $cabinService = CabinService::findOrFail($id);
        $cabinService->update([
            'name' => $request->name,
            'service_id' => $request->service_id,
            'cabin_id' => $request->cabin_id,
        ]);

        return response()->json($cabinService);
    }

    public function destroy($id)
    {
        $cabinService = CabinService::findOrFail($id);
        $cabinService->delete();

        return response()->json(null, 204);
    }
}
