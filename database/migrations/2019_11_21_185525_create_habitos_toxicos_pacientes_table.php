<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabitosToxicosPacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitos_toxicos_pacientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('paciente_id')->nullable();
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->unsignedBigInteger('habito_toxico_id')->nullable();
            $table->foreign('habito_toxico_id')->references('id')->on('habitos_toxicos');
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
        Schema::dropIfExists('habitos_toxicos_pacientes');
    }
}
