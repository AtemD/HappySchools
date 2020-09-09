<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->integer('urn')->unique();
            $table->string('name');
            $table->text('type');
            $table->text('logo')->nullable();
            $table->string('street')->nullable();
            $table->string('locality')->nullable();
            $table->text('address_3')->nullable();
            $table->string('town');
            $table->string('phone', 20);
            $table->string('fax', 20)->nullable();
            $table->text('website')->nullable();
            $table->string('post_code');
            $table->json('long_lat')->nullable();
            $table->foreignId('principal');
            $table->timestamps();

            $table->foreign('principal')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schools');
    }
}
