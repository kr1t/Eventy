<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventBoothTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_booth_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('-');
            $table->double('price')->default(0);
            $table->integer('status')->default(1)->comment('1 ประเภท 2 ขนาด 3 เพิ่ม');
            $table->double('amount')->default(0);
            $table->bigInteger('event_id');

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
        Schema::dropIfExists('event_booth_types');
    }
}