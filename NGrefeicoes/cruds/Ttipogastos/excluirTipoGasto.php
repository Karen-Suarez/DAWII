<?php
include_once '../../classes/classTipoGastos.php';

$tipoGastoId= $_GET['IdTipoGasto'];

$obj = new TipoGastos();
$objD = new dadosTipoGastos();
$test=$objD->ExcluirTipoGastos($tipoGastoId);

if ($test == TRUE) {
    echo 'Dado apagado com sucesso';
} else {
    echo 'ops, deu erro!';
}