<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    public function estado_civil()
    {
        return $this->belongsTo('App\EstadoCivil');
    }

    public function ocupacion()
    {
        return $this->belongsTo('App\Ocupacion');
    }

    public function obra_social()
    {
        return $this->belongsTo('App\ObraSocial');
    }

    public function ciudad()
    {
        return $this->belongsTo('App\Ciudad');
    }
    
    public function mostrar(){
        $departamento = empty($this->ciudad)? "Sin datos": $this->ciudad->nombre . " - " . $this->ciudad->provincia->nombre;
        return number_format($this->dni, 0, ',', '.') . " - " . $this->nombre . " " . $this->apellido . " - " . $departamento;
    }

    public function consultas()
    {
        return $this->hasMany('App\Consulta');
    }

    // Campos de historia clínica

    public function alergias_paciente()
    {
        return $this->hasMany('App\AlergiaPaciente');
    }

    public function antecedentes_familiares_paciente()
    {
        return $this->hasMany('App\AntecedenteFamiliarPaciente');
    }

    public function antecedentes_patologicos_paciente()
    {
        return $this->hasMany('App\AntecedentePatologicoPaciente');
    }

    public function antecedentes_quirurgicos_paciente()
    {
        return $this->hasMany('App\AntecedenteQuirurgicoPaciente');
    }

    public function habitos_toxicos_paciente()
    {
        return $this->hasMany('App\HabitoToxicoPaciente');
    }

    public function medicamentos_paciente()
    {
        return $this->hasMany('App\MedicamentoPaciente');
    }

}
