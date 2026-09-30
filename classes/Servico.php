<?php

class Servico {
    private string $nome;
    private float $preco;
    private int $duracaoMinutos;

    public function __construct(string $nome, float $preco, int $duracaoMinutos) {
        $this->nome = $nome;
        $this->setPreco($preco);
        $this->duracaoMinutos = $duracaoMinutos;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getPreco(): float {
        return $this->preco;
    }

    public function setPreco(float $preco): void {
        if ($preco < 0) {
            $this->preco = 0.0;
        } else {
            $this->preco = $preco;
        }
    }

    public function getDuracaoMinutos(): int {
        return $this->duracaoMinutos;
    }

    public function exibirDados(): void {
        echo "=== SERVIÇO ===<br>";
        echo "Serviço: " . $this->nome . "<br>";
        echo "Preço: R$ " . number_format($this->preco, 2, ',', '.') . "<br>";
        echo "Duração: " . $this->duracaoMinutos . " minutos<br>";
    }
}