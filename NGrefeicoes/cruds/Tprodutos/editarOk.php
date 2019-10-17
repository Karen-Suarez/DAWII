<?php
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
$objDP= new DadosProduto;


if ($objDP->editar($objProd)) {
    echo 'DADOS INSERIDOS COM SUCESSO';
}