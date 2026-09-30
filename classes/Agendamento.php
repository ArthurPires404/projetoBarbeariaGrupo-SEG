<?php

require_once 'Cliente.php';
require_once 'Barbeiro.php';
require_once 'Servico.php';

class Agendamento {
    private Cliente $cliente;
    private Barbeiro $barbeiro;
    private Servico $servico;
    private string $dataHora;
    private bool $concluido;

    public function __construct(Cliente $cliente, Barbeiro $barbeiro, Servico $servico, string $dataHora) {
        $this->cliente = $cliente;
        $this->barbeiro = $barbeiro;
        $this->servico = $servico;
        $this->dataHora = $dataHora;
        $this->concluido = false;
    }

    public function finalizarAtendimento(): void {
        $this->concluido = true;
    }

    public function exibirDados(): void {
        echo "=== AGENDAMENTO ===<br>";
        
        echo "Cliente: " . $this->cliente->getNome() . "<br>";
        echo "Barbeiro: " . $this->barbeiro->getNome() . "<br>";
        echo "Serviço: " . $this->servico->getNome() . " (R$ " . number_format($this->servico->getPreco(), 2, ',', '.') . ")<br>";
        echo "Data e Hora: " . $this->dataHora . "<br>";
        echo "Situação: " . ($this->concluido ? "Concluído" : "Pendente") . "<br>";
    }
}
