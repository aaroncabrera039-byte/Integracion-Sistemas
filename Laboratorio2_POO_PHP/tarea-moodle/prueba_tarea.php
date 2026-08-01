<?php

require __DIR__ . '/vendor/autoload.php';

use App\Models\Tablero;
use App\Models\Tarea;
use App\Models\TareaUrgente;
use App\Models\TareaRecurrente;
use App\Models\Columna;
use App\Contracts\Notificable;
use App\Contracts\Comentable;

echo "=== PRUEBA DE VERIFICACIÓN: Tarea Semana 2 ===" . PHP_EOL;

$pasadas = 0;
$total = 0;

function verificar(string $d, bool $c): void
{
    global $pasadas, $total;
    $total++;

    if ($c) {
        $pasadas++;
        echo "PASÓ: $d" . PHP_EOL;
    } else {
        echo "FALLÓ: $d" . PHP_EOL;
    }
}

// 1. Herencia
$urgente = new TareaUrgente("Prueba", "2026-12-01");
verificar(
    "TareaUrgente ES-UNA Tarea (herencia)",
    $urgente instanceof Tarea
);

$recurrente = new TareaRecurrente("Prueba 2", "diaria");
verificar(
    "TareaRecurrente ES-UNA Tarea (herencia)",
    $recurrente instanceof Tarea
);

// 2. Interfaces
verificar(
    "TareaUrgente implementa Notificable",
    $urgente instanceof Notificable
);

verificar(
    "TareaRecurrente implementa Notificable",
    $recurrente instanceof Notificable
);

verificar(
    "Tarea implementa Comentable",
    $urgente instanceof Comentable
);

// 3. Polimorfismo
verificar(
    "notificar() difiere entre TareaUrgente y TareaRecurrente",
    $urgente->notificar() !== $recurrente->notificar()
);

// 4. Comentarios
$urgente->agregarComentario("Comentario de prueba");

verificar(
    "La tarea almacena comentarios",
    count($urgente->getComentarios()) === 1
);

// 5. Composición
$columna = new Columna("Por hacer");
$columna->agregarTarea($urgente);

$tablero = new Tablero("Mi Tablero");
$tablero->agregarTarea($urgente);

verificar(
    "La columna contiene una tarea",
    $columna->contarTareas() === 1
);

verificar(
    "El tablero contabiliza tareas",
    $tablero->contarTareasTotales() >= 1
);

echo PHP_EOL;
echo "Resultado: $pasadas de $total pruebas aprobadas." . PHP_EOL;