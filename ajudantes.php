<?php
$textooriginal= "frodo;sam;prippinn;eu";
$hobbits= explode(";",$textooriginal);
foreach ($hobbits as $hobbit) {
    echo $hobbit . "<br />";
}
 function traduz_prioridade($codigo)
 {
    $prioridade='';
    switch($codigo){
        case 1:
            $prioridade ='baixa';
            break;
        case 2;
            $prioridade = 'Media';
            break;
        case 3 ;
            $prioridade = 'Alta';
            break;

    }
    return $prioridade;
 }
?>