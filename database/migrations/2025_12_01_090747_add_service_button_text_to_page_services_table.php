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
            $table->string('service_button_text')->nullable()->after('service_description_ar');
            $table->string('service_button_text_ar')->nullable()->after('service_button_text');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_services', function (Blueprint $table) {
            $table->dropColumn('service_button_text');
            $table->dropColumn('service_button_text_ar');
        });
    }
};
