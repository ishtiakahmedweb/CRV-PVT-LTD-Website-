<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'app_name',
        'logo',
        'favicon',
        'primary_color',
        'secondary_color',
        'bg_color',
        'text_color',
        'contact_email',
        'contact_phone',
        'address',
        'whatsapp_number',
        'facebook_url',
        'instagram_url',
        'linkedin_url',
        'google_maps_embed',
        'header_menu',
        'footer_text',
    ];

    protected $casts = [
        'header_menu' => 'array',
    ];
}
