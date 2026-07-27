<?php

require_once __DIR__ . '/src/App/Dominio/Item.php';
require_once __DIR__ . '/src/App/Dominio/Priorizable.php';
require_once __DIR__ . '/src/App/Dominio/Tarea.php';

use App\Dominio\Tarea;

$hoy = new \DateTimeImmutable();

// Tarea con fecha en el pasado (-3 días)
$fechaPasada = $hoy->modify('-3 days');
$tareaPasada = new Tarea('Entrega de avance del proyecto', 1, $fechaPasada);

// Tarea con fecha en el futuro (+5 días)
$fechaFutura = $hoy->modify('+5 days');
$tareaFutura = new Tarea('Presentación final', 2, $fechaFutura);

// Impresión de resultados
echo "Tarea del pasado vencida: " . ($tareaPasada->esVencida($hoy) ? 'sí' : 'no') . PHP_EOL;
echo "Tarea del futuro vencida: " . ($tareaFutura->esVencida($hoy) ? 'sí' : 'no') . PHP_EOL;