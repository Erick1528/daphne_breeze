<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'image_jpg',
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
}
