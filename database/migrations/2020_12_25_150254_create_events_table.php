<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');

            $table->string('image1');
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();

            $table->date('date');
            $table->time('time');
            $table->time('end_time');

            $table->json('tag')->nullable();
            $table->text('des');

            $table->text('map_name')->nullable();
            $table->text('map_address')->nullable();
            $table->text('google_map_url')->nullable();
            $table->string('mrt')->nullable();
            $table->string('bts')->nullable();
            $table->string('bus')->nullable();
            $table->string('near_location')->nullable();

            $table->bigInteger('user_id');

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
        Schema::dropIfExists('events');
    }
}