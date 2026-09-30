<?php

require_once 'Pessoa.php';

class Barbeiro extends Pessoa {
    private string $especialidade;

    public function __construct(string $nome, string $telefone, string $email, string $especialidade) {
        parent::__construct($nome, $telefone, $email);

        $this->especialidade = $especialidade;
    }

    public function exibirDados(): void {
        echo "=== BARBEIRO ===<br>";
        
        parent::exibirDados();
        
        echo "Especialidade: " . $this->especialidade . "<br>";
    }
}
