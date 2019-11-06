<?php

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
     header('location:listarVenda.php');
}else {
    echo 'DEU ERRO!!!';
}
