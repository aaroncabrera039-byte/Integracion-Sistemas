<?php

require 'vendor/autoload.php';

use App\Models\Tablero;
use App\Models\Tarea;
use App\Models\TareaUrgente;
use App\Models\TareaRecurrente;
use App\Contracts\Notificable;

$tablero = new Tablero("Mi Tablero");

$t1 = new Tarea("Diseñar base de datos");
$t2 = new TareaUrgente("Entregar Laboratorio I", "2026-08-11");
$t3 = new TareaRecurrente("Revisión semanal", "semanal");
$t4 = new Tarea("Actualizar documentación");

$tablero->agregarTarea($t1);
$tablero->agregarTarea($t2, "En progreso");
$tablero->agregarTarea($t3);
$tablero->agregarTarea($t4, "Hecho");

$t2->agregarComentario("Revisada por el equipo.");

echo $tablero->resumenGeneral() . PHP_EOL;

foreach ([$t1, $t2, $t3, $t4] as $tarea) {
    if ($tarea instanceof Notificable) {
        echo $tarea->notificar() . PHP_EOL;
    }
}

echo PHP_EOL;
echo "Comentarios de la tarea urgente:" . PHP_EOL;

foreach ($t2->getComentarios() as $comentario) {
    echo "- $comentario" . PHP_EOL;
}