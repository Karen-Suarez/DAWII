<?php
include_once './topo.php';
include_once '../../classes/classProdutos.php';
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
    //echo 'DADOS EDITADOS COM SUCESSO';
    ?>

    <div class="showback">
        <h4> Dados editados com sucesso!!!</h4>
        <div class="btn-group btn-group-justified">
            <div class="btn-group">
                <button type="button" class="btn btn-theme" onclick="window.location='listar_gastos.php'">Voltar pra lista</button>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-theme" onclick="window.location='index.php'">Pagina Principal</button>
            </div>
        </div>      				
    </div><!--/showback -->

    <?php
 include_once './rodape.html';
}