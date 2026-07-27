<?php

class Tarea
{
    private int $columna = 0;

    public function mover(int $indice): void
    {
        $this->columna = $indice;
    }

    public function columnaActual(): int
    {
        return $this->columna;
    }
}

$t = new Tarea();

$t->mover(2);

echo "Columna actual (vía método público): " . $t->columnaActual() . PHP_EOL;

// Intentamos acceder directamente a una propiedad privada
try {
    echo $t->columna;
} catch (\Error $e) {
    echo "Error controlado: " . $e->getMessage() . PHP_EOL;
}