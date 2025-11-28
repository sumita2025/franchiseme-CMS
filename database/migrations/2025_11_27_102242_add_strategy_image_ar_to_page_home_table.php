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
        Schema::table('page_home', function (Blueprint $table) {
            $table->string('strategy_image_ar')->nullable()->after('strategy_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_home', function (Blueprint $table) {
            $table->dropColumn('strategy_image_ar');
        });
    }
};
