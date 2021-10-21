<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('test');
            $table->string('question');
            $table->string('answer_true');
            $table->string('answer_2')->nullable();
            $table->string('answer_3')->nullable();
            $table->string('answer_4')->nullable();
            $table->string('answer_5')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('test')->references('id')->on('tests')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
