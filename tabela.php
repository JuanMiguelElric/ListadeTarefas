
<table>
        <tr>
            <th>Tarefas</th>
        </tr>
        <?php foreach($listaTarefas as $tarefa):?>
            <tr>
                <td><?php echo $tarefa['nome'];?></td>
                <td><?php echo $tarefa['descricao'];?></td>
                <td>
                    <?php echo traduz_data_para_exibir($tarefa['prazo']); ?>

                </td>
                <td>
                    <?php echo traduz_prioridade($tarefa['prioridade']); ?>
                </td>
                <td>
                    <a href="editar.php id=<?php echo $tarefa['id'];?>"></a>
                </td>
                <td>
                    <a href="remover.php" id=<?php echo $tarefa['id'];?>>
                    Remover
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
</table>