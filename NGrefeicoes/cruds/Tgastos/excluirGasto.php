<?php 
include_once '../../classes/classGastos.php';

$id= $_GET['IdGasto'];
$objG= new Gastos();
$objG->setIdGasto($id);
$objDG = new DadosGastos();
if ($objDG->excluir($objG)) {
    echo 'ELIMINADO';
    //header("Location: listarGasto.php");
} else {
    echo 'OPS DEU ERRO';
}