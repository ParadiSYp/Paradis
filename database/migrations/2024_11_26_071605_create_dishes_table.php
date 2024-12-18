<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishesTable extends Migration
{
    public function up()
{
    Schema::create('dishes', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('description');
        $table->decimal('price', 8, 2);
        $table->string('category'); // Супы, основные блюда и т.д.
        $table->string('image')->nullable(); // Путь к изображению
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('dishes');
    }
}