<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeSection extends Model
{
    protected $fillable = [
        'type',
        'title',
        'subtitle',
        'content',
        'image',
        'cta_text',
        'cta_link',
        'is_visible',
        'order',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];
}
