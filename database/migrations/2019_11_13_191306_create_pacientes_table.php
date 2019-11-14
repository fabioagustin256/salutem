<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('dni');
            $table->string('apellido', 50);
            $table->string('nombre', 50);
            $table->date('fecha_nacimiento')->nullable();
            $table->enum('sexo', ['Sin información', 'Masculino', 'Femenino'])->nullable();
            $table->unsignedBigInteger('estado_civil_id')->nullable();
            $table->foreign('estado_civil_id')->references('id')->on('estados_civiles');            
	        $table->unsignedBigInteger('ocupacion_id')->nullable();
            $table->foreign('ocupacion_id')->references('id')->on('ocupaciones');
            $table->unsignedBigInteger('obra_social_id')->nullable();
            $table->foreign('obra_social_id')->references('id')->on('obras_sociales');
            $table->string('telefono_fijo', 50)->nullable();
            $table->string('telefono_celular', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('domicilio', 50)->nullable();
            $table->unsignedBigInteger('localidad_id')->nullable();
            $table->foreign('localidad_id')->references('id')->on('localidades');
            $table->boolean('estado')->nullable()->default(true);  
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
        Schema::dropIfExists('pacientes');
    }
}
