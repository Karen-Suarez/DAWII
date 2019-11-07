<?php 
    include_once '../../classes/classProdutos.php';

    $nomeProduto = $_POST['nomeProduto'];
    $precoProduto = $_POST['precoProduto'];
    $comentarioProd = $_POST['comentarioProd'];

    $produto = new Produtos();
    $produto->setNomeProduto($nomeProduto);
    $produto->setPrecoProduto($precoProduto);
    $produto->setComentarioProduto($comentarioProd);
    $dadosProd= new DadosProduto();
    $ok= $dadosProd->insert($produto);
    
    if ($ok) {
        header('Location: insertProduto.html');
    }else {
        echo"opss deu ERROO!";
    }
?>