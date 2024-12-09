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
            $table->string('image');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->string('category'); // Поле для категории
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dishes');
    }
}