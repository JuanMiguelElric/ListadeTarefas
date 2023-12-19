php
Copy code
<?php
    $bdServidor = '127.0.0.1';
    $bdUsuario = 'BREID';
    $bdSenha = 'uGKa4sQfGqmKcZRZ';
    $bdBanco = 'tarefas';
    
    // Recebe os dados de conexão com o banco e abre a conexão
    $conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);

    // Verifica se houve erro na conexão
    if (mysqli_connect_errno()) {
        echo "Problemas para conectar no banco. Verifique os dados!";
        die();
    }
?>