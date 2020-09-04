<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating_surveys', function (Blueprint $table) {
            $table->foreignId('rater');
            $table->foreignId('question');
            $table->foreignId('answer');
            $table->timestamps();

            $table->foreign('rater')->references('id')->on('rater_lists');
            $table->foreign('question')->references('id')->on('questions');
            $table->foreign('answer')->references('id')->on('answers');

            $table->primary(['rater', 'question', 'answer']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rating_surveys');
    }
}
