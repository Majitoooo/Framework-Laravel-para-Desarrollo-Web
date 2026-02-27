<?php

namespace Maria\CursoPhp\Models;

class AnalisisEstudiantes
{
    public static function calcular($estudiantes)
    {
        $totalNotas = [];
        $contador = [];

        foreach ($estudiantes as $estudiante) {

            $nota = $estudiante[1];
            $carrera = $estudiante[2];
            
            if (!isset($totalNotas[$carrera])) {
                $totalNotas[$carrera] = 0;
                $contador[$carrera] = 0;
            }

            $totalNotas[$carrera] += $nota;
            $contador[$carrera]++;
        }

        return [$totalNotas,$contador];
    }

    public static function promedioMasBajo($totalNotas,$contador)
    {
        $promedios=[];

        foreach($totalNotas as $carrera=>$suma){
            $promedios[$carrera]=$suma/$contador[$carrera];
        }

        $valorMin=min($promedios);
        $carrera=array_search($valorMin,$promedios);

        return [$carrera,$valorMin];
    }

    public static function superiores($estudiantes,$totalNotas,$contador)
    {
        $resultado=[];

        foreach ($estudiantes as $estudiante) {

            $nombre = $estudiante[0];
            $nota = $estudiante[1];
            $carrera = $estudiante[2];

            $promedioCarrera = $totalNotas[$carrera] / $contador[$carrera];

            if ($nota > $promedioCarrera) {
                $resultado[]=$nombre;
            }
        }

        return $resultado;
    }
}