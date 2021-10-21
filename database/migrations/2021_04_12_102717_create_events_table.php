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
            $table->tinyInteger('image')->nullable();
            $table->string('title');
            $table->text('text');
            $table->string('start');
            $table->string('end');
            $table->string('address');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('image')->references('id')->on('event_images')->onDelete('restrict');
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
