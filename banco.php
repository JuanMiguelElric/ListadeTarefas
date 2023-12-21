<?php

    $bdServidor = '127.0.0.1'; //porta do servido           
    $bdUsuario = 'BREID';// usuario do servidor 
    $bdSenha = 'uGKa4sQfGqmKcZRZ'; // senha do servidor 
    $bdBanco = 'tarefas'; // tabela do servidor
    
    // Recebe os dados de conexão com o banco e abre a conexão
    $conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);

    // Verifica se houve erro na conexão
    if (mysqli_connect_errno()) {
        echo "Problemas para conectar no banco. Verifique os dados!";
        die();
    }


    function buscar_tarefa($conexao,$id){
        $sqlBusca = 'SELECT * FROM tarefas WHERE id ='.$id;
        $resultado = mysqli_query($conexao,$sqlBusca);
        return mysqli_fetch_assoc($resultado);
    }

    function buscar_tarefas($conexao)
    {
    $sqlBusca = 'SELECT * FROM tarefas';
    $resultado = mysqli_query($conexao, $sqlBusca);

    $tarefas = array();

    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        $tarefas[] = $tarefa;
    }

    return $tarefas;
    }
    function gravar_tarefa($conexao, $tarefa){
        // Verifica se a tarefa já existe
        $sqlVerificar = "
            SELECT id FROM tarefas
            WHERE nome = '{$tarefa['nome']}'
            AND descricao = '{$tarefa['descricao']}'
            AND prioridade = '{$tarefa['prioridade']}'
            AND prazo = '{$tarefa['prazo']}'
        ";
    
        $resultado = mysqli_query($conexao, $sqlVerificar);
    
        if (mysqli_num_rows($resultado) > 0) {


        } else {
            // Tarefa não existe, realiza a inserção
            $sqlGravar = "
                INSERT INTO tarefas
                (nome, descricao, prioridade, prazo)
                VALUES(
                    '{$tarefa['nome']}',
                    '{$tarefa['descricao']}',
                    '{$tarefa['prioridade']}',
                    '{$tarefa['prazo']}'
                )
            ";
    
            mysqli_query($conexao, $sqlGravar);

        }
    }
    
    function editar_tarefa($conexao, $tarefa)
    {
        $sqlEditar = "
            UPDATE tarefas SET
                nome = '{$tarefa['nome']}',
                descricao = '{$tarefa['descricao']}',
                prioridade = {$tarefa['prioridade']},
                prazo = '{$tarefa['prazo']}',
                concluida = {$tarefa['concluida']}
            WHERE id = {$tarefa['id']}
        ";

        mysqli_query($conexao, $sqlEditar);
    }
?>