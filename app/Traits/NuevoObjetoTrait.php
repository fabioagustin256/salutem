<?php

namespace App\Traits;

trait NuevoObjetoTrait{
    public function nuevo_objeto_clase($clase, $objeto)
    {
        $modelo = 'App\\' . $clase;

        $objetoclase = $modelo::where('nombre', $objeto)->get();
        if(count($objetoclase)==0)
        {
            try {
                $objetoclase = new $modelo();  
                $objetoclase->nombre = $objeto;
                $objetoclase->save();
                
                $correcto = true;
                $mensaje = "Se agregó correctamente";
            } catch (\Throwable $th) {
                //throw $th;
            }           
        }
        else 
        {
            $correcto = false;
            $mensaje = "El registro ya se encuentra en el listado";            
        }
        return ['objetoclase'=>$objetoclase, 'mensaje'=> $mensaje, 'correcto' => $correcto];
    }
}

