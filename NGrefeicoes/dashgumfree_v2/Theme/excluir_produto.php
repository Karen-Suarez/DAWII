<?php
include_once './topo.html';
include_once '../../classes/classProdutos.php';
$IdProduto= $_GET['IdProduto'];

$objProd= new Produtos();
$objProd->setIdProduto($IdProduto);
$objDP=new DadosProduto();
if ($objDP->excluir($objProd)) {
    //echo 'dados EXCLUIDO com sucesso!';  
    ?>

    <div class="showback">
        <h4> Dado excluído com sucesso!!!</h4>
        <div class="btn-group btn-group-justified">
            <div class="btn-group">
                <button type="button" class="btn btn-theme" onclick="window.location='listar_produtos.php'">Voltar pra lista</button>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-theme" onclick="window.location='index.php'">Pagina Principal</button>
            </div>
        </div>      				
    </div><!--/showback -->

    <?php
 include_once './rodape.html';
}