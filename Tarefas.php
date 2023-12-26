<?php
session_start();
include 'banco.php';
include 'ajudantes.php';
$exibir_tabela = true;
$tarefa = array();


if (isset($_POST['nome'])&& $_POST['nome'] != '') {
    $tarefa['nome'] = $_POST['nome'];

    $tarefa['descricao'] = isset($_POST['descricao']) ? $_POST['descricao'] : '';
    $tarefa['prazo'] = isset($_POST['prazo']) ? traduz_data_para_banco($_POST['prazo']) : '';
    $tarefa['prioridade'] = isset($_POST['prioridade']) ? $_POST['prioridade'] : '';
    $tarefa['concluida'] = isset($_POST['concluida']) ? $_POST['concluida'] : '';
    
    $_SESSION['listaTarefas'][] = $tarefa;
    gravar_tarefa($conexao, $tarefa);
    
    if (isset($_POST['nome']) && $_POST['nome'] != '') {
        $tarefa = array();
        $tarefa['nome'] = $_POST['nome'];
        $tarefa['descricao'] = isset($_POST['descricao']) ? $_POST['descricao'] : '';
        $tarefa['prazo'] = isset($_POST['prazo']) ? traduz_data_para_banco($_POST['prazo']) : '';
    
    
        // Verifica se 'prioridade' foi definida em $_POST
        $tarefa['prioridade'] = isset($_POST['prioridade']) ? $_POST['prioridade'] : '';
    
        $tarefa['concluida'] = isset($_POST['concluida']) ? $_POST['concluida'] : '';
    
        $_SESSION['listaTarefas'][] = $tarefa;
    }
    
    
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