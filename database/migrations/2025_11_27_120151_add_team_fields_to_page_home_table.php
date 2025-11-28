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
            $table->string('team_title6')->nullable()->after('team_description5_ar');
            $table->string('team_title6_ar')->nullable()->after('team_title6');
            $table->longText('team_description6')->nullable()->after('team_title6_ar');
            $table->longText('team_description6_ar')->nullable()->after('team_description6');
            $table->string('team_image6')->nullable()->after('team_description6_ar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_home', function (Blueprint $table) {
        $table->dropColumn('team_title6');
        $table->dropColumn('team_title6_ar');
        $table->dropColumn('team_description6');
        $table->dropColumn('team_description6_ar');
        $table->dropColumn('team_image6');
        });
    }
};
