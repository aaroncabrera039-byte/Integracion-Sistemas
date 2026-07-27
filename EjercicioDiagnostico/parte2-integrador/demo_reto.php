<?php

require_once __DIR__ . '/src/App/Dominio/Priorizable.php';
require_once __DIR__ . '/src/App/Dominio/Item.php';
require_once __DIR__ . '/src/App/Dominio/Tarea.php';
require_once __DIR__ . '/src/App/Dominio/Nota.php';

use App\Dominio\Tarea;
use App\Dominio\Nota;

$items = [
    new Tarea(
        'Refactorizar login',
        1,
        new \DateTimeImmutable('+5 days')
    ),

    new Nota(
        'Recordar reunión con el cliente'
    ),

    new Tarea(
        'Escribir pruebas unitarias',
        2,
        new \DateTimeImmutable('+2 days')
    ),
];

foreach ($items as $item) {
    echo $item->titulo()
        . " -> "
        . $item->estado()
        . " (prioridad "
        . $item->prioridad()
        . ")"
        . PHP_EOL;
}