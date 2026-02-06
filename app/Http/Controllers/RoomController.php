<?php

namespace App\Http\Controllers;

use App\Models\Room;

class RoomController extends Controller
{
    /**
     * Muestra el detalle de una habitación (solo activas).
     */
    public function show(Room $room)
    {
        if (! $room->active) {
            abort(404);
        }

        return view('room.show', compact('room'));
    }
}
