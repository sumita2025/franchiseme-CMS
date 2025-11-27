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
        Schema::create('page_franchises', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->longText('description')->nullable();
            $table->longText('brand_title')->nullable();
            $table->longText('franchise_title')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_franchises');
    }
};
