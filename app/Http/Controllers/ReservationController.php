<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Mostrar todas las reservas.
     */
    public function index()
    {
        $reservations = Reservation::with(['user', 'cabin'])->get();
        return response()->json($reservations);
    }

    /**
     * Mostrar una reserva específica.
     */
    public function show($id)
    {
        $reservation = Reservation::with(['user', 'cabin'])->find($id);

        if (!$reservation) {
            return response()->json(['message' => 'Reserva no encontrada'], 404);
        }

        return response()->json($reservation);
    }

    /**
     * Crear una nueva reserva.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'cabin_id' => 'required|exists:cabins,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $reservation = Reservation::create($validated);

        return response()->json($reservation, 201);
    }

    /**
     * Actualizar una reserva existente.
     */
    public function update(Request $request, $id)
    {
        $reservation = Reservation::find($id);

        if (!$reservation) {
            return response()->json(['message' => 'Reserva no encontrada'], 404);
        }

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'cabin_id' => 'required|exists:cabins,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $reservation->update($validated);

        return response()->json($reservation);
    }

    /**
     * Eliminar una reserva.
     */
    public function destroy($id)
    {
        $reservation = Reservation::find($id);

        if (!$reservation) {
            return response()->json(['message' => 'Reserva no encontrada'], 404);
        }

        $reservation->delete();

        return response()->json(['message' => 'Reserva eliminada'], 200);
    }
}
