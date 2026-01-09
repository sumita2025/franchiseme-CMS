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
        Schema::table('page_services', function (Blueprint $table) {
            $table->text('package_title')->change();
            $table->text('package_title_ar')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_services', function (Blueprint $table) {
            $table->string('package_title', 255)->change();
            $table->string('package_title_ar', 255)->change();
        });
    }
};
