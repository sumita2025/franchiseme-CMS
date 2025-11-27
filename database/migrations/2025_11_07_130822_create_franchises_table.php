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
        Schema::create('franchises', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('sector')->nullable();
            $table->string('country')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('investment_level')->nullable();
            $table->string('link_text')->nullable();
            $table->string('link_url')->nullable();
            $table->string('franchise_slug')->unique();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('franchises');
    }
};
