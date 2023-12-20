<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        fieldset {
            border: none;
            margin-bottom: 20px;
        }

        legend {
            font-weight: bold;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4caf50;
            color: #fff;
        }
    </style>
</head>
<body> 
    <?php include 'Tarefas.php'?>
    <h1>Gerenciador de Tarefas</h1>
    <form action="" method="get">
        <fieldset>
            <legend>Nova Tarefa</legend>
            <label for="">
                <input type="text" name="nome" id="">
            </label>
            <label for="">
                Descrição
                <textarea name="descricao" id="" cols="30" rows="10"></textarea>
            </label>
            <label for="">
                prazo
                <input type="text" name="prazo" id="">
            </label>
            <fieldset>
                <legend>Prioridade:</legend>
                <label for="">
                    <input type="radio" name="prioridade " value="1" checked id=""> Baixa
                    <input type="radio" name="prioridade " value="2" id=""> Media
                    <input type="radio" name="prioridade " value="3" id=""> Alta
                </label>
            </fieldset>
            <input type="submit" value="cadastrar">
        </fieldset>
    </form>
    <table>
        <tr>
            <th>Tarefas</th>
        </tr>
        <?php foreach($listaTarefas as $tarefa):?>
            <tr>
                <td><?php echo $tarefa['nome'];?></td>
                <td><?php echo $tarefa['descricao'];?></td>
                <td><?php echo $tarefa['prazo'];?></td>
                <td>
                    <?php echo traduz_prioridade($tarefa['prioridade']); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>