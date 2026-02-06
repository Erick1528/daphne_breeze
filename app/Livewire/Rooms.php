<?php

namespace App\Livewire;

use App\Models\Room;
use Livewire\Component;

class Rooms extends Component
{
    public function render()
    {
        $rooms = Room::where('active', true)
            ->orderBy('order')
            ->orderBy('id')
            ->get()
            ->map(function ($room) {
                return [
                    'id' => $room->id,
                    'title' => $room->title,
                    'image' => $room->image,
                    'persons' => $room->persons,
                    'beds' => $room->beds,
                    'beds_label' => $room->beds_label,
                ];
            })
            ->toArray();

        return view('livewire.rooms', [
            'rooms' => $rooms,
        ]);
    }
}
