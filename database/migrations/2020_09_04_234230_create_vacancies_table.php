<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('position');
            $table->string('required_study_level');
            $table->string('description');
            $table->date('deadline');
            $table->foreignId('posted_by');
            $table->foreignId('recruiter');
            $table->timestamps();

            $table->foreign('posted_by')->references('id')->on('users');
            $table->foreign('recruiter')->references('id')->on('schools');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacancies');
    }
}
