<?php

namespace App\Dominio;

class Tarea extends Item implements Priorizable
{
    public const COLUMNAS = ['Por hacer', 'En progreso', 'Hecho'];

    private int $columna = 0;
    private int $prioridad;
    private \DateTimeImmutable $fechaLimite; // TODO 1: Propiedad privada para fecha límite

    // TODO 2: Constructor modificado para incluir $fechaLimite
    public function __construct(string $titulo, int $prioridad, \DateTimeImmutable $fechaLimite)
    {
        parent::__construct($titulo);
        $this->prioridad = $prioridad;
        $this->fechaLimite = $fechaLimite;
    }

    public function mover(int $indice): void
    {
        $this->columna = $indice;
    }

    public function estado(): string
    {
        return self::COLUMNAS[$this->columna];
    }

    public function prioridad(): int
    {
        return $this->prioridad;
    }

    // TODO 3: Método para evaluar si la tarea está vencida
    public function esVencida(\DateTimeImmutable $hoy): bool
    {
        return $hoy > $this->fechaLimite;
    }
}