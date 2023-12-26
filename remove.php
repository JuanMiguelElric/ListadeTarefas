<?php

include "banco.php";

remover_Tarefas($conexao,$_GET['id']);

header('$location:Tarefas.php');