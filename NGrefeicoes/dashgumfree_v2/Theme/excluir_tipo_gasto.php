<?php
include_once './topo.php';
include_once '../../classes/classTipoGastos.php';

$tipoGastoId= $_GET['IdTipoGasto'];

$obj = new TipoGastos();
$objD = new dadosTipoGastos();


if ($objD->ExcluirTipoGastos($tipoGastoId)) {
    //echo 'dados EXCLUIDO com sucesso!';  
    ?>

    <div class="showback">
        <h4> Dado excluído com sucesso!!!</h4>
        <div class="btn-group btn-group-justified">
            <div class="btn-group">
                <button type="button" class="btn btn-theme" onclick="window.location='listar_tipo_gastos.php'">Voltar pra lista</button>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-theme" onclick="window.location='index.php'">Pagina Principal</button>
            </div>
        </div>      				
    </div><!--/showback -->

    <?php
 include_once './rodape.html';
}