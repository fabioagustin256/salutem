<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('dni')->nullable();
            $table->string('apellido', 50);
            $table->string('nombre', 50);
            $table->date('fecha_nacimiento');
            $table->enum('sexo', ['Sin información', 'Masculino', 'Femenino'])->nullable();
            $table->enum('estado_civil', 
                        ['Sin información', 'Soltero/a', 'Casado/a', 'Viudo/a'])
                    ->nullable();
            $table->string('ocupacion', 50)->nullable();
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
        Schema::dropIfExists('personas');
    }
}
