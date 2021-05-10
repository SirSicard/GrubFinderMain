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
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->text('address');
            $table->text('phone');
            $table->text('website')->nullable();
//            $table->longText('gmap');
            $table->timestamps();

//            foreign key associations
            $table->foreignId('location_id')
                ->references('id')
                ->on('locations')
                ->onDelete('cascade');

            $table->foreignId('status_id')
                ->references('id')
                ->on('statuses')
                ->onDelete('cascade');


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
