<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-top: 20px;
        }

        h1 {
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        fieldset {
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: #fff;
        }

    </style>
</head>
<body>
    <h1>Gerenciador de Tarefas</h1>
    <form action="" method="get"> <!-- Adicionei o método "get" para enviar os dados via URL -->
        <fieldset>
            <legend>Nova Tarefa</legend>
            <label for="nome">
                <input type="text" name="nome" id="nome"> <!-- Adicionei um id ao input -->
            </label>
            <input type="submit" value="Cadastrar">
        </fieldset>
    </form>
    <?php
        // $_GET é usado para armazenar os dados que estão na URL
        if(isset($_GET['nome'])){
            $_SESSION['listadeTarefas'][] = $_GET['nome']; // Corrigi o nome da variável
        }
        $listadeTarefas = array();
        if(isset($_SESSION['listadeTarefas'])){
            $listadeTarefas = $_SESSION['listadeTarefas'];
        }
    ?>
    <table>
        <tr>
            <th>Tarefas</th>
        </tr>
        <?php foreach($listadeTarefas as $tarefa): ?>
            <tr>
                <td><?php echo $tarefa; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
