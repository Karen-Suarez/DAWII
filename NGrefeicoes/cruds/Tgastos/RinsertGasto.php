<?php
include_once '../../classes/classTipoGastos.php';
include_once '../../classes/classGastos.php';

$idTipoGastoFk= $_POST['idTipoGastoFk'];
$dataGasto= $_POST['dataGasto'];
$horaGasto= $_POST['horaGasto'];
$valorGasto= $_POST['valorGasto'];
$comentarioGasto= $_POST['comentarioGasto'];

$objGasto= new Gastos();
$objGasto->setIdTipoGastoFk($idTipoGastoFk);
$objGasto->setDataGasto($dataGasto);
$objGasto->setHoraGasto($horaGasto);
$objGasto->setValorGasto($valorGasto);
$objGasto->setComentarioGasto($comentarioGasto);
$objDadosGasto= new DadosGastos();
$obj= $objDadosGasto->insert($objGasto);

if ($obj == TRUE) {
    echo '<br>GASTO INSERTADO CORRECTAMENTE';
} else {
    echo '<br>OPS DEU ERRO';
}
