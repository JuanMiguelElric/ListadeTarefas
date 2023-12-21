
<form action="" method="get">
    <fieldset>
        <legend>Nova Tarefa</legend>
        <fieldset>
            <label for="">
                <input type="hidden" name="" value=<?php isset($tarefa['id'])?>>
            </label>
        </fieldset>
        <label for="">
            <input type="text" name="nome" value="<?php $tarefa['nome']; ?>">
        </label>
        <label for="">
            Descrição
            <textarea name="descricao" id="" cols="30"  rows="10">
                <?php $tarefa['descricao'];?>
            </textarea>
        </label>
        <label for="">
            prazo
            <input type="text" name="prazo" value="<?php echo traduz_data_para_Banco($tarefa['prazo'])?>" id="">
        </label>
        <fieldset>
            <legend>Prioridade:</legend>
            <label for="">
                <input type="radio" name="prioridade " value="1" 
                <?php echo ($tarefa['prioridade']==1) ? 'checked': '';?> checked id=""> Baixa
                <input type="radio" name="prioridade " value="2" <?php echo ($tarefa['prioridade'] ==2 ) ?'checked':''; ?> id=""> Media
                <input type="radio" name="prioridade " value="3" <?php echo($tarefa['prioridade'] == 3) ? 'checked':'';?> id=""> Alta
            </label>
        </fieldset>
        <input type="checkbox" name="concluida" value="1"
        <?php echo ($tarefa['concluida'] == 1)
        ? 'checked'
        : '';
        ?> />
         <input type="submit" value="<?php echo isset($tarefa['id']) && $tarefa['id'] > 0 ? 'Atualizar' : 'Cadastrar'; ?> ">

    </fieldset>
</form>