<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dishes', function (Blueprint $table) {
            Schema::create('dishes', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('category'); // Например: супы, вторые блюда, закуски
                $table->text('description');
                $table->decimal('price', 8, 2);
                $table->string('image'); // Путь к изображению
                $table->timestamps();
            });
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dishes');
    }
};
