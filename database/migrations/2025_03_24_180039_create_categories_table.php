<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name_fr')->unique();
            $table->string('name_en')->nullable();
            $table->string('name_ar')->nullable();
            $table->string('name_es')->nullable();
            $table->string('image')->nullable(); // Pour stocker l'image de la catégorie
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
}
