<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Offer extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'link',
        'start_date',
        'end_date',
        'discount_percent',
        'terms',
        'featured',
        'active',
        'order',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'discount_percent' => 'integer',
        'featured' => 'boolean',
        'active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Ruta de la imagen en formato JPG para Open Graph (Facebook, etc.).
     * Si no existe la versión og, devuelve la imagen principal como fallback.
     */
    public function getOgImagePathAttribute(): ?string
    {
        if (! $this->image) {
            return null;
        }
        $relative = str_replace('storage/', '', $this->image);
        $dir = pathinfo($relative, PATHINFO_DIRNAME);
        $baseName = pathinfo($relative, PATHINFO_FILENAME);
        $ogRelative = $dir . '/og/' . $baseName . '.jpg';

        return Storage::disk('public')->exists($ogRelative)
            ? 'storage/' . $ogRelative
            : $this->image;
    }
}
