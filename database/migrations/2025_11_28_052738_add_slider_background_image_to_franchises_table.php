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
        Schema::table('franchises', function (Blueprint $table) {
            $table->string('slider_background_image')->nullable()->after('logo');
            $table->string('tag')->nullable()->after('description');
            $table->string('tag_ar')->nullable()->after('tag');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('franchises', function (Blueprint $table) {
            $table->dropColumn('slider_background_image');
            $table->dropColumn('tag');
            $table->dropColumn('tag_ar');
        });
    }
};
