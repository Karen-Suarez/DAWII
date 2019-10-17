<?php
include_once '../../classes/classTipoGastos.php';

$NomeTipoGasto = $_POST['NomeTipoGasto'];
$ComentarioTipoGasto = $_POST['ComentarioTipoGasto'];
$IdTipoGasto = $_POST['IdTipoGasto'];

$objTgEdit= new TipoGastos();
$objTgEdit->setNomeTipoGasto($NomeTipoGasto);
$objTgEdit->setComentarioTipoGasto($ComentarioTipoGasto);
$objTgEdit->setIdTipoGasto($IdTipoGasto);
$objDtg= new dadosTipoGastos();

if ($objDtg->EditarTipoGastos($objTgEdit)) {
    echo 'DADOS EDITADOS COM SUCESSO';
}