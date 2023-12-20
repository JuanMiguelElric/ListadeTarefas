<?php
    function buscar_tarefa($conexao,$id){
        $sqlBusca = 'SELECT * FROM tarefas WHERE id ='.$id;
        $resultado = mysqli_query($conexao,$sqlBusca);
        return mysqli_fetch_assoc($resultado);
    }
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
?>