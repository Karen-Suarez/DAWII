<?php
include_once './topo.php';
include_once '../../classes/classVendas.php';
$idVenda= $_GET['IdVenda'];

$objVenda= new Vendas();
$objVenda->setIdVenda($idVenda);
$objDV= new DadosVenda();

if ($objDV->excluir($objVenda)) {
    //echo 'ELIMINADO';
    ?>

    <div class="showback">
        <h4> Dado excluído com sucesso!!!</h4>
        <div class="btn-group btn-group-justified">
            <div class="btn-group">
                <button type="button" class="btn btn-theme" onclick="window.location = 'listar_vendas.php'">Voltar pra lista</button>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-theme" onclick="window.location = 'index.php'">Pagina Principal</button>
            </div>
        </div>      				
    </div><!--/showback -->

    <?php
    include_once './rodape.html';
}