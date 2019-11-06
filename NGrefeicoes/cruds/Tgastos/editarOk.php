<?php
include_once '../../classes/classGastos.php';

$data= $_POST['DataGasto'];
$hora= $_POST['HoraGasto'];
$valor= $_POST['ValorGasto'];
$comentario= $_POST['ComentarioGasto'];
$id= $_POST['IdGasto'];
$TipoGasto = $_POST['TipoGasto'];

$objG= new Gastos();
$objG->setDataGasto($data);
$objG->setHoraGasto($hora);
$objG->setValorGasto($valor);
$objG->setComentarioGasto($comentario);
$objG->setIdGasto($id);
$objG->setIdTipoGastoFk($TipoGasto);
$objDG= new DadosGastos();

if($objDG->editar($objG)){
    header('Location: listarGasto.php');
}

