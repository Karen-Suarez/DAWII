<?php
include_once './topo.php';
include_once '../../classes/classTipoGastos.php';

$nomeTgasto = $_POST['nomeTgasto'];
$comentarioTgasto = $_POST['comentarioTgasto'];

$tipoGasto = new TipoGastos();
$tipoGasto->setNomeTipoGasto($nomeTgasto);
$tipoGasto->setComentarioTipoGasto($comentarioTgasto);
$insert = new dadosTipoGastos();
$insertok = $insert->insert($tipoGasto);

if ($insertok) {
    ?>

    <div class="showback">
        <h4> Dados incluidos com sucesso</h4>
        <div class="btn-group btn-group-justified">
            <div class="btn-group">
                <button type="button" class="btn btn-theme" onclick="window.location='insert_tipo_gastos.php'">Adicionar mais</button>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-theme" onclick="window.location='listar_tipo_gastos.php'">Lista de T. Gastos</button>
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

