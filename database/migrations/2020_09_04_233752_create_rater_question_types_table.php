<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaterQuestionTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rater_question_types', function (Blueprint $table) {
            $table->foreignId('rater_type');
            $table->foreignId('question_type');
            $table->timestamps();

            $table->foreign('rater_type')->references('id')->on('rater_types');
            $table->foreign('question_type')->references('id')->on('question_types');
            $table->primary(['rater_type', 'question_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rater_question_types');
    }
}
