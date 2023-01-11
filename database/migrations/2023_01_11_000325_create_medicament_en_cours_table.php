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
        Schema::create('medicament_en_cours', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->integer('traitement_cours_id')->unsigned();
            $table->foreign('traitement_cours_id')->references('id')->on('traitement_en_cours');
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
        Schema::dropIfExists('medicament_en_cours');
    }
};
