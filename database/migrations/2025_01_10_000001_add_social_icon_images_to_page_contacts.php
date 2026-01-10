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
        Schema::table('page_contacts', function (Blueprint $table) {
            // English social icon images
            $table->string('social_icon_image_1')->nullable()->after('social_media_text');
            $table->string('social_icon_image_2')->nullable()->after('social_icon_image_1');
            $table->string('social_icon_image_3')->nullable()->after('social_icon_image_2');
            $table->string('social_icon_image_4')->nullable()->after('social_icon_image_3');
            $table->string('social_icon_image_5')->nullable()->after('social_icon_image_4');

            // Arabic social icon images
            $table->string('social_icon_image_1_ar')->nullable()->after('social_icon_image_5');
            $table->string('social_icon_image_2_ar')->nullable()->after('social_icon_image_1_ar');
            $table->string('social_icon_image_3_ar')->nullable()->after('social_icon_image_2_ar');
            $table->string('social_icon_image_4_ar')->nullable()->after('social_icon_image_3_ar');
            $table->string('social_icon_image_5_ar')->nullable()->after('social_icon_image_4_ar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_contacts', function (Blueprint $table) {
            $table->dropColumn([
                'social_icon_image_1',
                'social_icon_image_2',
                'social_icon_image_3',
                'social_icon_image_4',
                'social_icon_image_5',
                'social_icon_image_1_ar',
                'social_icon_image_2_ar',
                'social_icon_image_3_ar',
                'social_icon_image_4_ar',
                'social_icon_image_5_ar',
            ]);
        });
    }
};
