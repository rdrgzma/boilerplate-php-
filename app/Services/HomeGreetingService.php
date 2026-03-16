<?php

namespace App\Services;

class HomeGreetingService
{
    public function execute(): string
    {
        // Aqui ficariam regras de banco, validações, cálculos, integrações, etc.
        return "Serviço executado com sucesso às " . date('H:i:s');
    }
}