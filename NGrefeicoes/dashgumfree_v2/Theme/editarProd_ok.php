<?php
include_once './topo.html';
include_once '../../classes/classProdutos.php';

$NomeProduto = $_POST['NomeProduto'];
$PrecoProduto = $_POST['PrecoProduto'];
$ComentarioProduto = $_POST['ComentarioProduto'];
$IdProduto = $_POST['IdProduto'];

$objProd= new Produtos();
$objProd->setNomeProduto($NomeProduto);
$objProd->setPrecoProduto($PrecoProduto);
$objProd->setComentarioProduto($ComentarioProduto);
$objProd->setIdProduto($IdProduto);
$objDprod= new DadosProduto();

if ($objDprod->editar($objProd)) {
    //echo 'DADOS EDITADOS COM SUCESSO';
    ?>

    <div class="showback">
        <h4> Dados editados com sucesso!!!</h4>
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