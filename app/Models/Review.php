<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'author_name',
        'content',
        'rating',
        'review_date',
        'source',
        'active',
        'order',
    ];

    protected $casts = [
        'rating' => 'integer',
        'review_date' => 'date',
        'active' => 'boolean',
        'order' => 'integer',
    ];
}
