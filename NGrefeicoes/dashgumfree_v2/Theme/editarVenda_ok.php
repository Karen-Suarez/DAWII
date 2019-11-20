<?php
include_once './topo.php';
include_once '../../classes/classVendas.php';

$DataVenda = $_POST['DataVenda'];
$Quantidade = $_POST['Quantidade'];
$Preco = $_POST['Preco'];
$Produto = $_POST['Produto'];
$IdVenda = $_POST['IdVenda'];

$objVenda = new Vendas();
$objVenda->setDataVenda($DataVenda);
$objVenda->setQuantidadeVenda($Quantidade);
$objVenda->setPrecoVenda($Preco);
$objVenda->setIdProdutoFk($Produto);
$objVenda->setIdVenda($IdVenda);
$objDV= new DadosVenda();

if ($objDV->editar($objVenda)) {
    //header('location:listarVenda.php');
   //echo 'DADOS EDITADOS COM SUCESSO';
    ?>

    <div class="showback">
        <h4> Dados editados com sucesso!!!</h4>
        <div class="btn-group btn-group-justified">
            <div class="btn-group">
                <button type="button" class="btn btn-theme" onclick="window.location='listar_vendas.php'">Voltar pra lista</button>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-theme" onclick="window.location='index.php'">Pagina Principal</button>
            </div>
        </div>      				
    </div><!--/showback -->

    <?php
 include_once './rodape.html';
}