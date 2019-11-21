<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntecedentesQuirurgicosPacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedentes_quirurgicos_pacientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('paciente_id')->nullable();
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->unsignedBigInteger('ant_quirurgico_id')->nullable();
            $table->foreign('ant_quirurgico_id')->references('id')->on('antecedentes_quirurgicos');
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
        Schema::dropIfExists('antecedentes_quirurgicos_pacientes');
    }
}
