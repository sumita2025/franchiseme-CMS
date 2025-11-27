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
        Schema::create('page_home', function (Blueprint $table) {
            $table->id();
            
            // Hero Section
            $table->string('hero_background_image')->nullable();
            $table->longText('hero_title')->nullable();
            $table->string('hero_button_text')->nullable();
            $table->string('hero_button_url')->nullable();

            $table->longText('hero_title_ar')->nullable();
            $table->string('hero_button_text_ar')->nullable();
            $table->string('hero_button_url_ar')->nullable();

            // About Section
            $table->string('about_image')->nullable();
            $table->longText('about_title')->nullable();
            $table->longText('about_description')->nullable();
            $table->string('about_button_text')->nullable();
            $table->string('about_button_url')->nullable();

            $table->longText('about_title_ar')->nullable();
            $table->longText('about_description_ar')->nullable();
            $table->string('about_button_text_ar')->nullable();
            $table->string('about_button_url_ar')->nullable();

            // Mission Section
            $table->longText('vision_title')->nullable();
            $table->longText('vision_description')->nullable();
            $table->longText('mission_title')->nullable();
            $table->longText('mission_description')->nullable();

            $table->longText('vision_title_ar')->nullable();
            $table->longText('vision_description_ar')->nullable();
            $table->longText('mission_title_ar')->nullable();
            $table->longText('mission_description_ar')->nullable();

            // Team Section
            $table->longText('team_title')->nullable();
            $table->longText('team_description')->nullable();
            for ($i = 1; $i <= 5; $i++) {
                $table->string("team_image{$i}")->nullable();
                $table->string("team_title{$i}")->nullable();
                $table->longText("team_description{$i}")->nullable();
            }

            $table->longText('team_title_ar')->nullable();
            $table->longText('team_description_ar')->nullable();
            for ($i = 1; $i <= 5; $i++) {
                $table->string("team_title{$i}_ar")->nullable();
                $table->longText("team_description{$i}_ar")->nullable();
            }

            // Achievement Section
            $table->longText('achievement_title')->nullable();
            $table->longText('achievement_tag_line')->nullable();
            $table->longText('achievement_description')->nullable();
            $table->string('achievement_image')->nullable();

            $table->longText('achievement_title_ar')->nullable();
            $table->longText('achievement_tag_line_ar')->nullable();
            $table->longText('achievement_description_ar')->nullable();

            // Client Section
            $table->longText('client_title')->nullable();
            $table->longText('client_description')->nullable();
            for ($i = 1; $i <= 8; $i++) {
                $table->string("client_logo_image{$i}")->nullable();
            }

            $table->longText('client_title_ar')->nullable();
            $table->longText('client_description_ar')->nullable();

            $table->string('strategy_image')->nullable();
            for ($i = 1; $i <= 10; $i++) {
                $table->string("strategy_title{$i}")->nullable();
                $table->longText("strategy_description{$i}")->nullable();
            }

            for ($i = 1; $i <= 10; $i++) {
                $table->string("strategy_title{$i}_ar")->nullable();
                $table->longText("strategy_description{$i}_ar")->nullable();
            }

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_home');
    }
};
