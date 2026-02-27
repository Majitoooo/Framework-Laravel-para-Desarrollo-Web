<?php

require __DIR__ . '/../vendor/autoload.php';

use Maria\CursoPhp\Controllers\MainController;

$controller = new MainController();
$controller->index();