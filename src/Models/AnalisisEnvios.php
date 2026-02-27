<?php

namespace Maria\CursoPhp\Models;

class AnalisisEnvios
{
    public static function costoEntregados($envios)
    {
        $total = 0;

        foreach ($envios as $e) {
            if ($e['estado'] === "Entregado") {
                $total += $e['peso'] * $e['costo'];
            }
        }

        return $total;
    }

    public static function ciudadMayorPeso($envios)
    {
        $pesos = [];

        foreach ($envios as $e) {
            $ciudad = $e['ciudad'];

            if (!isset($pesos[$ciudad])) {
                $pesos[$ciudad] = 0;
            }

            $pesos[$ciudad] += $e['peso'];
        }

        $maxCiudad = null;
        $maxPeso = 0;

        foreach ($pesos as $ciudad => $peso) {
            if ($peso > $maxPeso) {
                $maxPeso = $peso;
                $maxCiudad = $ciudad;
            }
        }

        return [$maxCiudad,$maxPeso];
    }

    public static function mejorTransportista($envios)
    {
        $conteo = [];

        foreach ($envios as $e) {
            if ($e['estado'] === "Entregado") {

                $t = $e['transportista'];

                if (!isset($conteo[$t])) {
                    $conteo[$t] = 0;
                }

                $conteo[$t]++;
            }
        }

        $mejor = null;
        $max = 0;

        foreach ($conteo as $t => $c) {
            if ($c > $max) {
                $max = $c;
                $mejor = $t;
            }
        }

        return [$mejor,$max];
    }
}