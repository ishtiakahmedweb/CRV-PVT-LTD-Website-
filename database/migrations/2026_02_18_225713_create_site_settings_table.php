<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('app_name')->default('CRV LTD');
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            
            // Theme Colors
            $table->string('primary_color')->default('#FFD700'); // Gold
            $table->string('secondary_color')->default('#B8860B'); // Dark Gold
            $table->string('bg_color')->default('#0a0a0a'); // Dark Carbon
            $table->string('text_color')->default('#FFFFFF');
            
            // Contact Info
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->text('address')->nullable();
            $table->string('whatsapp_number')->nullable();
            
            // Social Links
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('linkedin_url')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
