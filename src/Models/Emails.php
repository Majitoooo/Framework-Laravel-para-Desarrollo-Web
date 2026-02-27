<?php

namespace Maria\CursoPhp\Models;

class Emails
{
    public static function enviar($destino,$asunto,$mensaje)
    {
        $headers = "From: laravel@ucaldas.prueba";

        return mail($destino,$asunto,$mensaje,$headers);
    }
}