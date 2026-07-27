<?php

class Tarea {}

$tarea1 = new Tarea();
$tarea2 = new Tarea();

// Practica realizada: comparando la misma instancia da true
var_dump($tarea1 === $tarea1); // bool(true)

// Salida del nombre de la clase
echo get_class($tarea1) . PHP_EOL; // Tarea
echo get_class($tarea2) . PHP_EOL; // Tarea