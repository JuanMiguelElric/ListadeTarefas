<?php
session_start();
include 'banco.php';
include 'ajudantes.php';
$exibir_tabela = true;


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

function buscar_tarefas($conexao)
{
    $sqlBusca = 'SELECT * FROM tarefas';
    $resultado = mysqli_query($conexao, $sqlBusca);

    if (!$resultado) {
        die('Erro na consulta: ' . mysqli_error($conexao));
    }

    $tarefas = array();
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        $tarefas[] = $tarefa;
    }

    return $tarefas;
}
gravar_tarefa($conexao,$tarefa);

function gravar_tarefa($conexao, $tarefa){
    $sqlGravar ="
        INSERT INTO tarefas
        (nome, descricao, prioridade,prazo)
        VALUES(
            '{$tarefa['nome']}',
            '{$tarefa['descricao']}',
            '{$tarefa['prioridade']}',
            '{$tarefa['prazo']}'
        )
    ";
    mysqli_query($conexao, $sqlGravar);
}
?>
