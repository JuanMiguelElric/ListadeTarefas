<?php
    session_start();
    include 'banco.php';
    include 'ajudantes.php';
    $exibir_tabela=false;

    if(isset($_POST['nome']) && $_POST['nome'] != ''){
        $tarefa = array();

        $tarefa['id'] = $_POST['id'];
        $tarefa ['nome'] = $_POST['nome'];

        if (isset($_POST['descricao'])) {
            $tarefa['descricao'] = $_POST['descricao'];
        }else{
            $tarefa['descricao'] = '';
        }
        if (isset($_POST['prazo'])){
            $tarefa['prazo'] = traduz_data_para_Banco( $_POST['prazo']);
        }else{
            $tarefa['prazo'] = '';
        }
        $tarefa['prioridade']=$tarefa['prioridade'];
        
        if(isset($_POST['concluida'])){
            $tarefa['concluida']=1;
        }else{
            $tarefa['concluida']=0;
        }
        $editar_tarefa($conexao,$tarefa);
        header('Location: template.php');
        die();
    }
    $tarefa = buscar_tarefa($conexao, $_POST['id']);
    include 'template.php';
?>