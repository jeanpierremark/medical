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
        Schema::create('consultations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('medecins');
            $table->string('motifConsultation');
            $table->date('dateConsultation');
            $table->string('modeDevie');
            $table->string('decision');
            $table->string('histoireMaladie');
            $table->string('maladie');
            $table->string('handicap');
            $table->string('alergie');
            $table->string('operation');
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
        Schema::dropIfExists('consultations');
    }
};
