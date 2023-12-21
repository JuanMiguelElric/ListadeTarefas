<?php
session_start();
include 'banco.php';
include 'ajudantes.php';
$exibir_tabela = true;
$tarefa = array();


if (isset($_GET['nome'])) {
    $tarefa['nome'] = $_GET['nome'];
} else {
    $tarefa['nome'] = ''; // Defina um valor padrão ou deixe vazio, dependendo do seu caso.
}

$tarefa['descricao'] = isset($_GET['descricao']) ? $_GET['descricao'] : '';
$tarefa['prazo'] = isset($_GET['prazo']) ? traduz_data_para_banco($_GET['prazo']) : '';
$tarefa['prioridade'] = isset($_GET['prioridade']) ? $_GET['prioridade'] : '';
$tarefa['concluida'] = isset($_GET['concluida']) ? $_GET['concluida'] : '';

$_SESSION['listaTarefas'][] = $tarefa;
gravar_tarefa($conexao, $tarefa);

if (isset($_GET['nome']) && $_GET['nome'] != '') {
    $tarefa = array();
    $tarefa['nome'] = $_GET['nome'];
    $tarefa['descricao'] = isset($_GET['descricao']) ? $_GET['descricao'] : '';
    $tarefa['prazo'] = isset($_GET['prazo']) ? traduz_data_para_banco($_GET['prazo']) : '';


    // Verifica se 'prioridade' foi definida em $_GET
    $tarefa['prioridade'] = isset($_GET['prioridade']) ? $_GET['prioridade'] : '';

    $tarefa['concluida'] = isset($_GET['concluida']) ? $_GET['concluida'] : '';

    $_SESSION['listaTarefas'][] = $tarefa;
}

$listaTarefas = buscar_tarefas($conexao);


gravar_tarefa($conexao,$tarefa);


$tarefas = array(
    'id' => 0,
    'nome' => '',
    'descicao' =>'',
    'prazo' =>'',
    'prioridade'=>''

);
?>