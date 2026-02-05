<?php

namespace App\Livewire;

use Livewire\Component;

class Rooms extends Component
{
    public array $rooms = [];

    public function mount(): void
    {
        $this->rooms = [
            [
                'title' => 'Habitación doble',
                'image' => 'build/assets/habitacion doble.jpeg',
                'persons' => 2,
                'beds' => 1,
                'beds_label' => '1 cama doble',
            ],
            [
                'title' => 'Habitación sencilla',
                'image' => 'build/assets/habitacion sencilla.jpeg',
                'persons' => 1,
                'beds' => 1,
                'beds_label' => '1 cama individual',
            ],
            [
                'title' => 'Habitación doble (vista)',
                'image' => 'build/assets/hdoble.jpeg',
                'persons' => 2,
                'beds' => 1,
                'beds_label' => '1 cama doble',
            ],
            [
                'title' => 'Suite con área de estar',
                'image' => 'build/assets/lobby.jpeg',
                'persons' => 3,
                'beds' => 1,
                'beds_label' => '1 cama doble + sofá',
            ],
            [
                'title' => 'Habitación estándar',
                'image' => 'build/assets/C2.jpeg',
                'persons' => 2,
                'beds' => 1,
                'beds_label' => '1 cama doble',
            ],
            [
                'title' => 'Habitación familiar',
                'image' => 'build/assets/C3.jpeg',
                'persons' => 4,
                'beds' => 2,
                'beds_label' => '2 camas dobles',
            ],
            [
                'title' => 'Habitación con vista',
                'image' => 'build/assets/C4.jpeg',
                'persons' => 2,
                'beds' => 1,
                'beds_label' => '1 cama doble',
            ],
        ];
        shuffle($this->rooms);
    }

    public function render()
    {
        return view('livewire.rooms');
    }
}
