<?php
include_once '../../classes/classProdutos.php';
$IdProduto= $_GET['IdProduto'];

$objProd= new Produtos();
$objProd->setIdProduto($IdProduto);
$objDP=new DadosProduto();
if ($objDP->excluir($objProd)) {
    echo 'dados EXCLUIDO com sucesso!';  
}

