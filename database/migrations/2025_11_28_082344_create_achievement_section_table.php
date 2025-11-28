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
        Schema::create('achievement_section', function (Blueprint $table) {
            $table->id();
            $table->string('achievement_title')->nullable();
            $table->string('achievement_tag_line')->nullable();
            $table->text('achievement_description')->nullable();

            $table->string('achievement_title_ar')->nullable();
            $table->string('achievement_tag_line_ar')->nullable();
            $table->text('achievement_description_ar')->nullable();

            $table->string('achievement_image')->nullable();

            $table->string('counter_text')->nullable();
            $table->integer('counter_number')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievement_section');
    }
};
