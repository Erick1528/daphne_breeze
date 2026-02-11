<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    protected $rules = [
        'author_name' => 'required|string|max:255',
        'content' => 'required|string',
        'rating' => 'required|integer|min:1|max:5',
        'review_date' => 'nullable|date',
        'source' => 'nullable|string|max:50',
        'active' => 'boolean',
        'order' => 'nullable|integer|min:0',
    ];

    protected $messages = [
        'author_name.required' => 'El nombre del autor es obligatorio.',
        'author_name.max' => 'El nombre no puede superar 255 caracteres.',
        'content.required' => 'El texto de la reseña es obligatorio.',
        'rating.required' => 'La valoración es obligatoria.',
        'rating.integer' => 'La valoración debe ser un número del 1 al 5.',
        'rating.min' => 'La valoración mínima es 1.',
        'rating.max' => 'La valoración máxima es 5.',
        'review_date.date' => 'La fecha debe ser válida.',
        'source.max' => 'El origen no puede superar 50 caracteres.',
        'order.integer' => 'El orden debe ser un número entero.',
        'order.min' => 'El orden no puede ser negativo.',
    ];

    protected function validationAttributes(): array
    {
        return [
            'author_name' => 'nombre del autor',
            'content' => 'texto de la reseña',
            'rating' => 'valoración',
            'review_date' => 'fecha de la reseña',
            'source' => 'origen',
            'order' => 'orden',
        ];
    }

    public function index()
    {
        $reviews = Review::orderBy('order')->orderBy('id')->get();
        return view('admin.reviews.index', compact('reviews'));
    }

    public function create()
    {
        return view('admin.reviews.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules, $this->messages, $this->validationAttributes());
        $validated['active'] = $request->boolean('active');
        $validated['order'] = (int) ($validated['order'] ?? 0);
        $validated['review_date'] = $validated['review_date'] ?? null;
        $validated['source'] = $validated['source'] ?? null;

        Review::create($validated);

        return redirect()->route('admin.reviews.index')
            ->with('success', 'Reseña creada correctamente.');
    }

    public function edit(Review $review)
    {
        return view('admin.reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        $validated = $request->validate($this->rules, $this->messages, $this->validationAttributes());
        $validated['active'] = $request->boolean('active');
        $validated['order'] = (int) ($validated['order'] ?? 0);
        $validated['review_date'] = $validated['review_date'] ?? null;
        $validated['source'] = $validated['source'] ?? null;

        $review->update($validated);

        return redirect()->route('admin.reviews.index')
            ->with('success', 'Reseña actualizada correctamente.');
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->route('admin.reviews.index')
            ->with('success', 'Reseña eliminada correctamente.');
    }
}
