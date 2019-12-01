<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlergiasPacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alergias_pacientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('paciente_id')->nullable();
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->unsignedBigInteger('alergia_id')->nullable();
            $table->foreign('alergia_id')->references('id')->on('alergias');
            $table->text('observacion')->nullable();
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
        Schema::dropIfExists('alergias_pacientes');
    }
}
