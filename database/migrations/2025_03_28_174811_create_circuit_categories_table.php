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
        Schema::create('circuit_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name_fr')->unique();
            $table->string('name_en')->nullable();
            $table->string('name_ar')->nullable();
            $table->string('name_es')->nullable();
            $table->string('image')->nullable(); // Pour stocker l'image de la catégorie
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('circuit_categories');
    }
};
