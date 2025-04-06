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
        Schema::create('attraction_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('attraction_categories')->onDelete('cascade'); // Relation avec AttractionCategory
            $table->string('name_fr')->unique();
            $table->string('name_en')->nullable();
            $table->string('name_ar')->nullable();
            $table->string('name_es')->nullable();
            $table->text('description_fr')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->text('description_es')->nullable();
            $table->string('address');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('video')->nullable();
            $table->json('photos')->nullable(); // Stocker plusieurs images en JSON
            $table->decimal('rating', 2, 1)->default(0); // Note sur 5 étoiles
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attraction_services');
    }
};
