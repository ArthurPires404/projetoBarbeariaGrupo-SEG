<?php

class Pessoa {
    private string $nome;
    private string $telefone;
    private string $email;

    public function __construct(string $nome, string $telefone, string $email) {
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->email = $email;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function exibirDados(): void {
        echo "Nome: " . $this->nome . "<br>";
        echo "Telefone: " . $this->telefone . "<br>";
        echo "E-mail: " . $this->email . "<br>";
    }
}
