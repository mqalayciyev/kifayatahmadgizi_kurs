<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads_notes', function (Blueprint $table) {
            $table->id();
            $table->string('leads');
            $table->string('note');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('leads')->references('id')->on('leads')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads_notes');
    }
}
