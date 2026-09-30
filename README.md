# Sistema de Barbearia

## 📌 Situação-Problema
Gerenciar os horários, atendimentos e catálogo de serviços de uma barbearia em planilhas manuais ou anotações em papel frequentemente gera conflitos de agendamento, desorganização na gestão de clientes e falta de controle financeiro sobre os serviços prestados pelos profissionais.

## 🎯 Objetivo
O objetivo do projeto é fornecer uma solução backend simples, eficiente e orientada a objetos para gerenciar o fluxo principal de uma barbearia. O sistema automatiza o cadastro de clientes e profissionais, a prestação de serviços, a realização e finalização de agendamentos, além do controle de status de contas de usuários.

---

## 🛠️ Tecnologias Utilizadas
- **Linguagem:** PHP 8.x
- **Front-end:** HTML5 e CSS3 (para renderização visual das saídas)
- **Versionamento:** Git e GitHub

---

## ⚙️️ Principais Funcionalidades
- **Gestão de Pessoas:** Cadastro e controle de dados cadastrais para Clientes e Barbeiros.
- **Gestão de Serviços:** Cadastro de serviços oferecidos com controle de preços e duração em minutos.
- **Agendamento de Atendimentos:** Associação entre Cliente, Barbeiro e Serviço com controle de data/hora e status (Pendente / Concluído).
- **Controle de Status:** Capacidade de desativar clientes e finalizar atendimentos prestados.

---

## 📐 Principais Conceitos de POO Aplicados
O projeto foi modelado utilizando os pilares cruciais da Programação Orientada a Objetos:

- **Herança (`extends`):**
  - A classe base `Pessoa` encapsula atributos comuns (`nome`, `telefone`, `email`).
  - As classes `Cliente` e `Barbeiro` estendem `Pessoa`, herdando e estendendo suas características.
- **Encapsulamento (`private` / `protected` / `getters` e `setters`):**
  - Todos os atributos das classes utilizam modificadores de acesso fechados (`private`).
  - Acesso e alteração seguros por métodos públicos (ex: `getNome()`, `setPreco()`).
- **Polimorfismo e Sobrescrita de Métodos (`Override`):**
  - O método `exibirDados()` é definido na classe pai `Pessoa` e sobrescrito nas subclasses `Cliente` e `Barbeiro` chamando `parent::exibirDados()` para reaproveitamento de código.
- **Composição / Agregação de Objetos:**
  - A classe `Agendamento` recebe e gerencia instâncias de `Cliente`, `Barbeiro` e `Servico` para compor uma reserva completa.
- **Validação e Regras de Negócio:**
  - O método `setPreco()` na classe `Servico` valida e impede a atribuição de valores negativos.

---

## 📂 Organização Geral do Projeto

```text
.
├── Pessoa.php       # Classe base contendo atributos e métodos comuns a pessoas
├── Cliente.php      # Subclasse de Pessoa com preferências e status de conta
├── Barbeiro.php     # Subclasse de Pessoa com especialidades do profissional
├── Servico.php      # Classe responsável pela gestão de serviços e preços
├── Agendamento.php  # Classe principal para criação e gestão de atendimentos
└── index.php        # Script principal que executa e demonstra o funcionamento do sistema