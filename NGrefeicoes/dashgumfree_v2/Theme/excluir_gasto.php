<?php
include_once './topo.html';
include_once '../../classes/classGastos.php';

$id= $_GET['IdGasto'];
$objG= new Gastos();
$objG->setIdGasto($id);
$objDG = new DadosGastos();
if ($objDG->excluir($objG)) {
    //echo 'ELIMINADO';
    ?>

    <div class="showback">
        <h4> Dado excluído com sucesso!!!</h4>
        <div class="btn-group btn-group-justified">
            <div class="btn-group">
                <button type="button" class="btn btn-theme" onclick="window.location = 'listar_gastos.php'">Voltar pra lista</button>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-theme" onclick="window.location = 'index.php'">Pagina Principal</button>
            </div>
        </div>      				
    </div><!--/showback -->

    <?php
    include_once './rodape.html';
}