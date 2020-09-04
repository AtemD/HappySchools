<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaterListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rater_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school');
            $table->foreignId('rater');
            $table->char('token', '8')->unique();
            $table->boolean('is_used')->default(false);
            $table->timestamps();

            $table->foreign('school')->references('id')->on('schools');
            $table->foreign('rater')->references('id')->on('rater_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rater_lists');
    }
}
