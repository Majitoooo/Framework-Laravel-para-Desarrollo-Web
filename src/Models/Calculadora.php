<?php

namespace Maria\CursoPhp\Models;

class Calculadora
{
    public static function calcularInteres($capital,$tasa,$tiempo)
    {
        return $capital * pow((1 + $tasa), $tiempo);
    }

    public static function convertirVelocidad($valor,$origen,$destino)
    {
        switch($origen){
            case "kmh": $ms = $valor / 3.6; break;
            case "mph": $ms = $valor * 0.44704; break;
            case "ms": $ms = $valor; break;
        }

        switch($destino){
            case "kmh": return $ms * 3.6;
            case "mph": return $ms / 0.44704;
            case "ms": return $ms;
        }
    }
}