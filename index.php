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
        padding: 0 16px 72px;
        background: var(--fundo);
        color: var(--tinta);
        font-family: "Source Sans 3", "Segoe UI", Arial, sans-serif;
        font-size: 1.1rem;
        line-height: 1.8;
    }

    /* Faixa de barbeiro no topo */
    body::before {
        content: "";
        display: block;
        height: 14px;
        margin: 0 -16px 56px;
        background: repeating-linear-gradient(
            -45deg,
            var(--vermelho) 0 16px,
            #ffffff 16px 32px,
            var(--azul) 32px 48px,
            #ffffff 48px 64px
        );
    }

    .conteudo {
        max-width: 820px;
        margin: 0 auto;
        padding: 56px 64px 64px;
        background: var(--papel);
        border-radius: 8px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.35);
    }

    h1, h2 {
        font-family: "Oswald", Impact, "Arial Narrow", sans-serif;
        line-height: 1.2;
    }

    h1 {
        margin: 0 0 48px;
        font-size: 2.8rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        color: var(--fundo);
    }

    /* Cada grupo (Cliente, Barbeiro...) vira um bloco separado */
    .bloco {
        margin-bottom: 56px;
    }

    .bloco:last-child { margin-bottom: 0; }

    /* Nome da classe em destaque, vermelho */
    h2.classe {
        display: inline-block;
        margin: 0 0 24px;
        padding-bottom: 8px;
        font-size: 1.7rem;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        color: var(--vermelho);
        border-bottom: 3px solid var(--vermelho);
    }

    /* Títulos de ações (Finalizando, Desativando) em azul para não competir */
    h2.acao {
        margin: 0 0 24px;
        font-size: 1.5rem;
        font-weight: 500;
        color: var(--azul);
    }

    /* Cada objeto exibido fica num cartão próprio */
    .item {
        margin-bottom: 24px;
        padding: 20px 24px;
        background: #ffffff;
        border: 1px solid var(--linha);
        border-left: 5px solid var(--azul);
        border-radius: 4px;
    }

    .item:last-child { margin-bottom: 0; }

    .item p {
        margin: 8px 0;
    }

    .item p:first-child { margin-top: 0; }
    .item p:last-child  { margin-bottom: 0; }

    strong, b {
        color: var(--fundo);
        font-weight: 600;
    }

    ul {
        margin: 12px 0;
        padding-left: 24px;
    }

    li { margin: 8px 0; }

    hr {
        border: 0;
        border-top: 1px dashed var(--linha);
        margin: 56px 0;
    }

    @media (max-width: 560px) {
        .conteudo { padding: 32px 22px 36px; }
        h1 { font-size: 2.1rem; margin-bottom: 36px; }
        h2.classe { font-size: 1.4rem; }
        h2.acao { font-size: 1.25rem; }
        .item { padding: 16px 18px; }
        .bloco { margin-bottom: 40px; }
        hr { margin: 40px 0; }
    }
</style>
</head>
<body>
<div class="conteudo">
<?php

require_once 'classes/Pessoa.php';
require_once 'classes/Cliente.php';
require_once 'classes/Barbeiro.php';
require_once 'classes/Servico.php';
require_once 'classes/Agendamento.php';

/**
 * Exibe um grupo de objetos com o nome da classe em destaque (vermelho).
 */
function mostrarGrupo(string $titulo, array $objetos, string $classe = 'classe'): void
{
    echo "<section class='bloco'>";
    echo "<h2 class='$classe'>$titulo</h2>";
    foreach ($objetos as $objeto) {
        echo "<div class='item'>";
        $objeto->exibirDados();
        echo "</div>";
    }
    echo "</section>";
}

$cliente1 = new Cliente("João Silva", "9999-1111", "joao@email.com", "Degradê");
$barbeiro1 = new Barbeiro("Marcos", "8888-2222", "marcos@email.com", "Corte e Barba");
$servico1 = new Servico("Corte Degradê + Barba", 50.00, 45);
$agendamento1 = new Agendamento($cliente1, $barbeiro1, $servico1, "30/09/2026 às 14:00");
$cliente2 = new Cliente("Arthur Pires", "55991399998", "tutui@gmail.com", "Degradê");
$barbeiro2 = new Barbeiro("Kleber", "9999-9999", "klebinho@gmail.com", "Corte e Sombrancelha");
$servico2 = new Servico("Corte Degradê", 25.00, 20);
$agendamento2 = new Agendamento($cliente2, $barbeiro2, $servico2, "01/10/2026 às 18:00");

echo "<h1>Sistema de Barbearia</h1>";

mostrarGrupo("Cliente", [$cliente1, $cliente2]);
mostrarGrupo("Barbeiro", [$barbeiro1, $barbeiro2]);
mostrarGrupo("Serviço", [$servico1, $servico2]);
mostrarGrupo("Agendamento", [$agendamento1, $agendamento2]);

echo "<hr>";
echo "<h2 class='acao'>Finalizando Atendimento</h2>";

$agendamento1->finalizarAtendimento();
$agendamento2->finalizarAtendimento();

mostrarGrupo("Agendamento", [$agendamento1, $agendamento2]);

echo "<hr>";
echo "<h2 class='acao'>Desativando Clientes</h2>";

$cliente1->desativar();
$cliente2->desativar();

mostrarGrupo("Cliente", [$cliente1, $cliente2]);

?>
</div>
</body>
</html>
