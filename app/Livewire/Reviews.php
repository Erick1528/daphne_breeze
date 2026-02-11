<?php

namespace App\Livewire;

use App\Models\Review;
use Livewire\Component;

class Reviews extends Component
{
    public function render()
    {
        $reviews = Review::where('active', true)
            ->orderBy('order')
            ->orderBy('id')
            ->get();

        return view('livewire.reviews', compact('reviews'));
    }
}
