<?php

namespace App\Livewire;

use App\Models\Offer;
use Livewire\Component;

class Offers extends Component
{
    public array $offers = [];
    public bool $showAll = false;

    public function mount(bool $showAll = false): void
    {
        $this->showAll = $showAll;

        $query = Offer::where('active', true)->orderBy('order')->orderBy('id');

        $allOffers = $query->get()->map(fn (Offer $offer) => [
            'id'          => $offer->id,
            'title'       => $offer->title,
            'description' => $offer->description ?? '',
            'image'       => $offer->image,
            'link'        => $offer->link ?? null,
        ])->toArray();

        $this->offers = $showAll ? $allOffers : array_slice($allOffers, 0, 2);
    }

    public function getHasMoreOffersProperty(): bool
    {
        $total = Offer::where('active', true)->count();
        return $total > 2;
    }

    public function render()
    {
        return view('livewire.offers');
    }
}
