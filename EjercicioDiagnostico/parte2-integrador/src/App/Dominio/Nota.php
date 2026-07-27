<?php

namespace App\Dominio;

class Nota extends Item implements Priorizable
{
    public function estado(): string
    {
        return "Nota fija";
    }

    public function prioridad(): int
    {
        return 5;
    }
}