<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return response()->json($services);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:services,name',
            'description' => 'required|string|max:500',
        ]);

        $service = Service::create($validated);

        return response()->json($service, 201);
    }
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:services,name,' . $service->id,
            'description' => 'required|string|max:500',
        ]);

        $service->update($validated);

        return response()->json($service, 200);
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return response()->json(['message' => 'Servicio eliminado'], 200);
    }
}
