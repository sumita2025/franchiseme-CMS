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
        $table->integer('achievement_counter_one')->nullable()->after('achievement_image');
        $table->text('achievement_counter_one_en')->nullable()->after('achievement_counter_one');
        $table->text('achievement_counter_one_ar')->nullable()->after('achievement_counter_one_en');

        $table->integer('achievement_counter_two')->nullable()->after('achievement_counter_one_ar');
        $table->text('achievement_counter_two_en')->nullable()->after('achievement_counter_two');
        $table->text('achievement_counter_two_ar')->nullable()->after('achievement_counter_two_en');

        $table->integer('achievement_counter_three')->nullable()->after('achievement_counter_two_ar');
        $table->text('achievement_counter_three_en')->nullable()->after('achievement_counter_three');
        $table->text('achievement_counter_three_ar')->nullable()->after('achievement_counter_three_en');

        $table->integer('achievement_counter_four')->nullable()->after('achievement_counter_three_ar');
        $table->text('achievement_counter_four_en')->nullable()->after('achievement_counter_four');
        $table->text('achievement_counter_four_ar')->nullable()->after('achievement_counter_four_en');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_home', function (Blueprint $table) {
            //
        });
    }
};
