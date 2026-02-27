<?php

namespace Maria\CursoPhp\Controllers;

use Maria\CursoPhp\Models\AnalisisEstudiantes;
use Maria\CursoPhp\Models\AnalisisEnvios;
use Maria\CursoPhp\Models\Calculadora;

class MainController
{
    public function index()
    {
        $interesResultado = null;
        $velocidadResultado = null;

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            if (isset($_POST["calcularInteres"])) {

                $capital = $_POST["capital"];
                $tasa = $_POST["tasa"];
                $tiempo = $_POST["tiempo"];

                $interesResultado = Calculadora::calcularInteres($capital,$tasa,$tiempo);
            }

            if (isset($_POST["convertirVelocidad"])) {

                $valor = $_POST["valor"];
                $origen = $_POST["origen"];
                $destino = $_POST["destino"];

                $velocidadResultado = Calculadora::convertirVelocidad($valor,$origen,$destino);
            }
        }

        $estudiantes = [
            ['Jesus Salazar', 5.0, 'Ingeniería en Informática'],
            ['Maria Vasquez', 4.5, 'Medicina'],
            ['Carlos Manrique', 3.8, 'Ingeniería Civil'],
            ['Sofia Soto', 4.2, 'Arquitectura'],
            ['Diego Gracia', 4.0, 'Medicina'],
            ['Leonardo López', 4.7, 'Ingeniería en Informática'],
            ['Valentina Ramirez', 4.3, 'Ingeniería en Informática'],
            ['Mateo Fernandez', 3.9, 'Ingeniería Civil'],
            ['Camila Torres', 4.6, 'Arquitectura'],
            ['Sergio Morales', 4.1, 'Medicina']
        ];

        list($totales,$contador)=AnalisisEstudiantes::calcular($estudiantes);
        list($carrera,$promedio)=AnalisisEstudiantes::promedioMasBajo($totales,$contador);
        $sobresalientes=AnalisisEstudiantes::superiores($estudiantes,$totales,$contador);

        $envios = [
            ["id"=>1,"ciudad"=>"Manizales","transportista"=>"Nicolas Perez","peso"=>5,"costo"=>16500,"estado"=>"Entregado"],
            ["id"=>2,"ciudad"=>"Medellín","transportista"=>"Ana Salgado","peso"=>3,"costo"=>25000,"estado"=>"En ruta"],
            ["id"=>3,"ciudad"=>"Manizales","transportista"=>"Nicolas Perez","peso"=>7,"costo"=>20000,"estado"=>"Entregado"],
            ["id"=>4,"ciudad"=>"Cali","transportista"=>"Luis Fernandez","peso"=>4,"costo"=>18000,"estado"=>"Cancelado"],
            ["id"=>5,"ciudad"=>"Pereira","transportista"=>"Ana Salgado","peso"=>6,"costo"=>25000,"estado"=>"Entregado"],
            ["id"=>6,"ciudad"=>"Pereira","transportista"=>"Luis Fernandez","peso"=>8,"costo"=>22000,"estado"=>"Entregado"],
            ["id"=>7,"ciudad"=>"Cali","transportista"=>"Ana Salgado","peso"=>5,"costo"=>19000,"estado"=>"Entregado"],
            ["id"=>8,"ciudad"=>"Medellín","transportista"=>"Ana Salgado","peso"=>6,"costo"=>23500,"estado"=>"Entregado"],
            ["id"=>9,"ciudad"=>"Cali","transportista"=>"Julian Ramirez","peso"=>6,"costo"=>15100,"estado"=>"Entregado"],
            ["id"=>10,"ciudad"=>"Manizales","transportista"=>"Julian Ramirez","peso"=>10,"costo"=>50000,"estado"=>"Entregado"]
        ];

        $totalEnvios = AnalisisEnvios::costoEntregados($envios);
        list($ciudadMayor,$pesoMayor)=AnalisisEnvios::ciudadMayorPeso($envios);
        list($mejorTransportista,$cantidad)=AnalisisEnvios::mejorTransportista($envios);

        require __DIR__ . "/../Views/home.php";
        
    }
}