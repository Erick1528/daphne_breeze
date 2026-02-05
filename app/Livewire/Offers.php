<?php

namespace App\Livewire;

use Livewire\Component;

class Offers extends Component
{
    public array $offers = [];

    public function mount(): void
    {
        $this->offers = [
            [
                'title'       => 'Estancia con desayuno incluido',
                'description' => 'Reserva dos noches o más y lleva el desayuno incluido. Empieza cada día con café, fruta y opciones locales en nuestro restaurante.',
                'image'       => 'build/assets/hero.webp',
                'link'        => '#',
            ],
            [
                'title'       => 'Escapada en pareja',
                'description' => 'Noche de bienvenida, habitación con las mejores vistas y un detalle especial a tu llegada. Ideal para una escapada romántica.',
                'image'       => 'build/assets/habitacion doble.jpeg',
                'link'        => '#',
            ],
        ];
    }

    public function render()
    {
        return view('livewire.offers');
    }
}
