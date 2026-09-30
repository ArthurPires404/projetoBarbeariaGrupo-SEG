 <!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sistema de Barbearia</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;700&family=Source+Sans+3:wght@400;600&display=swap" rel="stylesheet">
<style>
    :root {
        --fundo: #14213d;
        --papel: #f6f5f1;
        --tinta: #1e2430;
        --suave: #5b6373;
        --vermelho: #c1272d;
        --azul: #1d4e89;
        --linha: #d9d6cc;
    }

    * { box-sizing: border-box; }

    body {
        margin: 0;
        padding: 0 16px 48px;
        background: var(--fundo);
        color: var(--tinta);
        font-family: "Source Sans 3", "Segoe UI", Arial, sans-serif;
        font-size: 1.05rem;
        line-height: 1.6;
    }

    /* Faixa de barbeiro no topo: o único elemento de destaque */
    body::before {
        content: "";
        display: block;
        height: 14px;
        margin: 0 -16px 40px;
        background: repeating-linear-gradient(
            -45deg,
            var(--vermelho) 0 16px,
            #ffffff 16px 32px,
            var(--azul) 32px 48px,
            #ffffff 48px 64px
        );
    }

    .conteudo {
        max-width: 720px;
        margin: 0 auto;
        padding: 40px 44px 44px;
        background: var(--papel);
        border-radius: 6px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.35);
    }

    h1, h2 {
        font-family: "Oswald", Impact, "Arial Narrow", sans-serif;
        color: var(--fundo);
        line-height: 1.15;
    }

    h1 {
        margin: 0 0 8px;
        font-size: 2.6rem;
        font-weight: 700;
        letter-spacing: 0.5px;
    }

    h2 {
        margin: 0 0 12px;
        font-size: 1.6rem;
        font-weight: 500;
        color: var(--vermelho);
    }

    hr {
        border: 0;
        border-top: 1px dashed var(--linha);
        margin: 28px 0;
    }

    p {
        margin: 6px 0;
    }

    strong, b {
        color: var(--fundo);
        font-weight: 600;
    }

    ul {
        margin: 6px 0;
        padding-left: 20px;
    }

    li { margin: 4px 0; }

    @media (max-width: 560px) {
        .conteudo { padding: 28px 22px 32px; }
        h1 { font-size: 2rem; }
        h2 { font-size: 1.35rem; }
    }
</style>
</head>
<body>
<div class="conteudo">
<?php

require_once 'Pessoa.php';
require_once 'Cliente.php';
require_once 'Barbeiro.php';
require_once 'Servico.php';
require_once 'Agendamento.php';

    
$cliente1 = new Cliente("João Silva", "9999-1111", "joao@email.com", "Degradê");
$barbeiro1 = new Barbeiro("Marcos", "8888-2222", "marcos@email.com", "Corte e Barba");
$servico1 = new Servico("Corte Degradê + Barba", 50.00, 45);
$agendamento1 = new Agendamento($cliente1, $barbeiro1, $servico1, "30/09/2026 às 14:00");

echo "<h1>Sistema de Barbearia</h1>";

echo "<hr>";
$cliente1->exibirDados();

echo "<hr>";
$barbeiro1->exibirDados();

echo "<hr>";
$servico1->exibirDados();

echo "<hr>";
$agendamento1->exibirDados();

echo "<hr>";
echo "<h2>Finalizando Atendimento</h2>";

$agendamento1->finalizarAtendimento();
$agendamento1->exibirDados();

echo "<hr>";
echo "<h2>Desativando Cliente</h2>";

$cliente1->desativar();
$cliente1->exibirDados();

?>
</div>
</body>
</html>