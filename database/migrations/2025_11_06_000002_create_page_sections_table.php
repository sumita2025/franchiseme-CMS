<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('page_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained()->onDelete('cascade');
            $table->string('name')->nullable();         // admin label, e.g. "hero_section"
            $table->string('type');                    // 'wysiwyg', 'image', 'hero', 'cards', 'cta', etc.
            $table->integer('position')->default(0);   // order on page
            $table->json('content')->nullable();       // flexible content: { "html": "...", "image":"...","btn_text":"", "btn_url":"" }
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('page_sections');
    }
};
