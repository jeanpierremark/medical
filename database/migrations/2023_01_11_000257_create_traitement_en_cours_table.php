<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traitement_en_cours', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->string('type');
            $table->integer('consultation_id')->unsigned();
            $table->foreign('consultation_id')->references('id')->on('consultations');
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
        Schema::dropIfExists('traitement_en_cours');
    }
};
