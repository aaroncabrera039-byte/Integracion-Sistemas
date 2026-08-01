<?php

namespace App\Models;

class Tablero
{
    private string $nombre;
    private array $columnas = [];

    public function __construct(string $nombre)
    {
        $this->nombre = $nombre;

        $this->columnas['Por hacer'] = new Columna('Por hacer');
        $this->columnas['En progreso'] = new Columna('En progreso');
        $this->columnas['Hecho'] = new Columna('Hecho');
    }

    public function agregarColumna(Columna $columna): void
    {
        $this->columnas[] = $columna;
    }

    public function agregarTarea(Tarea $tarea, string $columna = 'Por hacer'): void
    {
        if (isset($this->columnas[$columna])) {
            $this->columnas[$columna]->agregarTarea($tarea);
        }
    }

    public function contarTareasTotales(): int
    {
        $total = 0;

        foreach ($this->columnas as $columna) {
            $total += $columna->contarTareas();
        }

        return $total;
    }

    public function resumenGeneral(): string
    {
        $texto = "Tablero: {$this->nombre}" . PHP_EOL;

        foreach ($this->columnas as $nombre => $columna) {
            $texto .= "- {$nombre}: {$columna->contarTareas()} tarea(s)" . PHP_EOL;
        }

        return $texto;
    }
}