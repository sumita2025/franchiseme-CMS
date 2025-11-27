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
        Schema::create('franchise_brands', function (Blueprint $table) {
            $table->id();
            $table->string('slider_background_image')->nullable();
            $table->string('brand_image')->nullable();
            $table->string('brand_tag')->nullable();
            $table->string('brand_title')->nullable();
            $table->string('brand_slug')->unique();
            $table->longText('brand_description')->nullable();
            $table->string('brand_button')->nullable();
            $table->string('brand_button_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('franchise_brands');
    }
};
