<?php
include_once './topo.html';
include_once '../../classes/classVendas.php';

$idProduto = $_POST['produto'];
$data = $_POST['data'];
$quant = $_POST['quant'];
$preco = $_POST['preco'];

$objVenda = new Vendas();
$objVenda->setDataVenda($data);
$objVenda->setQuantidadeVenda($quant);
$objVenda->setPrecoVenda($preco);
$objVenda->setIdProdutoFk($idProduto);
$dadosInsert = new DadosVenda();
if ($dadosInsert->insert($objVenda) == TRUE) {

    ?>

    <div class="showback">
        <h4> Dados incluidos com sucesso</h4>
        <div class="btn-group btn-group-justified">
            <div class="btn-group">
                <button type="button" class="btn btn-theme" onclick="window.location='insert_vendas.php'">Adicionar mais</button>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-theme" onclick="window.location='listar_vendas.php'">Lista de Vendas</button>
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

