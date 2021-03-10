<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->string('phone_number');
            $table->string('restaurant_img');
            $table->string('restaurant_location');
            $table->string('opening_time');
            $table->string('closure_time');
            $table->boolean('free_shipping')->default(true);
            $table->float('price_shipping', 4,2);
            $table->float('quality', 2,1);
            $table->string('tag_id');
            $table->string('plate_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}