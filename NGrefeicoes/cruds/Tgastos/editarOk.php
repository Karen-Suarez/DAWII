<?php
include_once '../../classes/classGastos.php';

$data= $_POST['DataGasto'];
$hora= $_POST['HoraGasto'];
$valor= $_POST['ValorGasto'];
$comentario= $_POST['ComentarioGasto'];
$id= $_POST['IdGasto'];

$objG= new Gastos();
$objG->setDataGasto($data);
$objG->setHoraGasto($hora);
$objG->setValorGasto($valor);
$objG->setComentarioGasto($comentario);
$objG->setIdGasto($id);
$objDG= new DadosGastos();
if($objDG->editar($objG)){
    echo 'DADOS EDITADOS COM SUCESSO';
}

