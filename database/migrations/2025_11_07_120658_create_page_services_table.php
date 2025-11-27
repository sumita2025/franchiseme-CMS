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
        Schema::create('page_services', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('title_ar')->nullable();
            $table->longText('description')->nullable();
            $table->longText('description_ar')->nullable();
            $table->longText('consultant_title')->nullable();
            $table->longText('consultant_title_ar')->nullable();
            $table->longText('consultant_description')->nullable();
            $table->longText('consultant_description_ar')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_text_ar')->nullable();
            $table->string('button_url')->nullable();
            $table->string('button_url_ar')->nullable();
            $table->longText('package_section_title')->nullable();
            $table->longText('package_section_title_ar')->nullable();
            $table->longText('package_section_description')->nullable();
            $table->longText('package_section_description_ar')->nullable();

            // Service Items (1–5)
            for ($i = 1; $i <= 5; $i++) {
                $table->string("service_image{$i}")->nullable();
                $table->string("service_title{$i}")->nullable();
                $table->text("service_description{$i}")->nullable();
            }

            for ($i = 1; $i <= 5; $i++) {
                $table->string("service_image{$i}_ar")->nullable();
                $table->string("service_title{$i}_ar")->nullable();
                $table->text("service_description{$i}_ar")->nullable();
            }

            $table->string('package_title')->nullable();
            $table->string('package_button_text')->nullable();
            $table->string('package_button_url')->nullable();

            $table->string('package_title_ar')->nullable();
            $table->string('package_button_text_ar')->nullable();
            $table->string('package_button_url_ar')->nullable();

            $table->longText('service_title')->nullable();
            $table->longText('service_description')->nullable();

            $table->longText('service_title_ar')->nullable();
            $table->longText('service_description_ar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_services');
    }
};
