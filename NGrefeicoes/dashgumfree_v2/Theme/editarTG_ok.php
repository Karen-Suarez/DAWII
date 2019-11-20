<?php
include_once './topo.php';
include_once '../../classes/classTipoGastos.php';

$Id = $_POST['IdTipoGasto'];

$NomeTipoGasto = $_POST['NomeTipoGasto'];
$ComentarioTipoGasto = $_POST['ComentarioTipoGasto'];


$objTgEdit= new TipoGastos();
$objTgEdit->setNomeTipoGasto($NomeTipoGasto);
$objTgEdit->setComentarioTipoGasto($ComentarioTipoGasto);
$objTgEdit->setIdTipoGasto($Id);
$objDtg= new dadosTipoGastos();

if ($objDtg->EditarTipoGastos($objTgEdit)) {
    //echo 'DADOS EDITADOS COM SUCESSO';
    ?>

    <div class="showback">
        <h4> Dados editados com sucesso!!!</h4>
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