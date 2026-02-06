<?php

namespace App\Http\Controllers;

use App\Models\Offer;

class OfferController extends Controller
{
    /**
     * Muestra el detalle de una oferta (solo activas).
     */
    public function show(Offer $offer)
    {
        if (! $offer->active) {
            abort(404);
        }

        return view('offer.show', compact('offer'));
    }
}
