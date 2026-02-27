<?php

namespace Maria\CursoPhp\Models;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class Imagen
{
    public static function redimensionar($ruta,$ancho,$alto)
    {
        $manager = new ImageManager(new Driver());

        $image = $manager->read($ruta);
        $image->resize($ancho,$alto);
        $image->save($ruta);

        return $ruta;
    }
}