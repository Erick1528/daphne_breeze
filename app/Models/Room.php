<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'persons',
        'beds',
        'beds_label',
        'price',
        'active',
        'order',
    ];

    protected $casts = [
        'persons' => 'integer',
        'beds' => 'integer',
        'price' => 'decimal:2',
        'active' => 'boolean',
        'order' => 'integer',
    ];
}
