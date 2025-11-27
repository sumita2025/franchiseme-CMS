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
        Schema::create('page_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('page_title')->nullable();
            $table->string('page_title_ar')->nullable();
            $table->longText('title')->nullable();
            $table->longText('title_ar')->nullable();
            $table->longText('description')->nullable();
            $table->longText('description_ar')->nullable();
            
            // Contact Info
            $table->string('phone_text')->nullable();
            $table->string('phone_text_ar')->nullable();
            $table->string('phone_value')->nullable();
            $table->string('phone_value_ar')->nullable();
            $table->string('whatsapp_text')->nullable();
            $table->string('whatsapp_text_ar')->nullable();
            $table->string('whatsapp_value')->nullable();
            $table->string('whatsapp_value_ar')->nullable();
            $table->string('email_text')->nullable();
            $table->string('email_text_ar')->nullable();
            $table->string('email_value')->nullable();
            $table->string('email_value_ar')->nullable();
            $table->string('social_media_text')->nullable();
            $table->string('social_media_text_ar')->nullable();
            
            // Social links
            $table->string('social_link_1')->nullable();
            $table->string('social_link_1_ar')->nullable();
            $table->string('social_link_2')->nullable();
            $table->string('social_link_2_ar')->nullable();
            $table->string('social_link_3')->nullable();
            $table->string('social_link_3_ar')->nullable();
            $table->string('social_link_4')->nullable();
            $table->string('social_link_4_ar')->nullable();
            $table->string('social_link_5')->nullable();
            $table->string('social_link_5_ar')->nullable();

            $table->string('social_url_1')->nullable();
            $table->string('social_url_1_ar')->nullable();
            $table->string('social_url_2')->nullable();
            $table->string('social_url_2_ar')->nullable();
            $table->string('social_url_3')->nullable();
            $table->string('social_url_3_ar')->nullable();
            $table->string('social_url_4')->nullable();
            $table->string('social_url_4_ar')->nullable();
            $table->string('social_url_5')->nullable();
            $table->string('social_url_5_ar')->nullable();

            // Map section
            $table->longText('map_embed')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_contacts');
    }
};
