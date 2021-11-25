<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishAllergenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish_allergen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('allergen_id');
            $table->foreign('allergen_id')->references('id')->on('dishes');
            $table->unsignedBigInteger('dish_id');
            $table->foreign('dish_id')->references('id')->on('allergens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dish_allergen');
    }
}
