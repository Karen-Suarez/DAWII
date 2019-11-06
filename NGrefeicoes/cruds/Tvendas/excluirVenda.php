<?php 
include_once '../../classes/classVendas.php';
$idVenda= $_GET['IdVenda'];

$objVenda= new Vendas();
$objVenda->setIdVenda($idVenda);
$objDV= new DadosVenda();

if ($objDV->excluir($objVenda)) {
    header('location:listarVenda.php');
} else {
    echo 'deu erro!';
}