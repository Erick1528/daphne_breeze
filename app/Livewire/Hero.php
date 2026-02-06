<?php

namespace App\Livewire;

use App\Models\Offer;
use App\Models\Room;
use Livewire\Component;

class Hero extends Component
{
    public function render()
    {
        // Una habitación destacada (primera activa por orden) y una oferta (destacada o primera activa)
        $heroRoom = Room::where('active', true)->orderBy('order')->orderBy('id')->first();
        $heroOffer = Offer::where('active', true)
            ->orderByRaw('featured DESC')
            ->orderBy('order')
            ->orderBy('id')
            ->first();

        return view('livewire.hero', [
            'heroRoom' => $heroRoom,
            'heroOffer' => $heroOffer,
        ]);
    }
}
