<?php

require_once 'Pessoa.php';

class Cliente extends Pessoa {
    private string $preferenciaCorte;
    private bool $ativo;

    public function __construct(string $nome, string $telefone, string $email, string $preferenciaCorte) {
        parent::__construct($nome, $telefone, $email);

        $this->preferenciaCorte = $preferenciaCorte;
        $this->ativo = true;
    }

    public function desativar(): void {
        $this->ativo = false;
    }

    public function exibirDados(): void {
        echo "=== CLIENTE ===<br>";
        
        parent::exibirDados();
        
        echo "Preferência: " . $this->preferenciaCorte . "<br>";
        echo "Status: " . ($this->ativo ? "Ativo" : "Inativo") . "<br>";
    }
}
