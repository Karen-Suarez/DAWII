<?php
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
    header('location:listarVenda.php');
} else {
    echo 'Deu erro!';
}