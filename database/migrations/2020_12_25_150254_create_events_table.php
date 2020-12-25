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
            $table->date('date');
            $table->time('time');
            $table->string('tag');
            $table->text('des');
            $table->integer('b_amount')->default(1);
            $table->datetime('b_start_date')->nullable();
            $table->datetime('b_end_date')->nullable();
            $table->integer('b_amount_noti')->default(1);
            $table->string('b_title')->nullable();
            $table->text('b_des')->nullable();

            $table->integer('t_amount')->default(1);
            $table->datetime('t_date')->nullable();
            $table->datetime('t_end_date')->nullable();
            $table->integer('t_amount_noti')->default(1);
            $table->string('t_title')->nullable();
            $table->text('t_des')->nullable();

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