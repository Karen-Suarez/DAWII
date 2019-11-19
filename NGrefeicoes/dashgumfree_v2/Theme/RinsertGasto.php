<?php
include_once './topo.html';
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
    //echo '<br>GASTO INSERTADO CORRECTAMENTE';

    ?>

    <div class="showback">
        <h4> Dados incluidos com sucesso</h4>
        <div class="btn-group btn-group-justified">
            <div class="btn-group">
                <button type="button" class="btn btn-theme" onclick="window.location='insert_gastos.php'">Adicionar mais</button>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-theme" onclick="window.location='listar_gastos.php'">Lista de Gatos</button>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-theme" onclick="window.location='index.php'">Pagina Principal</button>
            </div>
        </div>      				
    </div><!--/showback -->

    <?php
    
    //header('Location: insertTipoGasto.html');
} else {
    echo"DEU ERRO";
}

include_once './rodape.html';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

