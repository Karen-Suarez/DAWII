<?php

include_once '../../classes/classTipoGastos.php';

$nomeTgasto = $_POST['nomeTgasto'];
$comentarioTgasto = $_POST['comentarioTgasto'];

$tipoGasto = new TipoGastos();
$tipoGasto->setNomeTipoGasto($nomeTgasto);
$tipoGasto->setComentarioTipoGasto($comentarioTgasto);
$insert = new dadosTipoGastos();
$insertok = $insert->insert($tipoGasto);

if ($insertok) {
    echo "dados incluidos com sucesso";
}else{
    echo"DEU ERRO";
}