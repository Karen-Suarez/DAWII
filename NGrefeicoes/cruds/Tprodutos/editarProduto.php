<?php
include_once '../../classes/classProdutos.php';

$idProduto= $_GET['IdProduto'];

$objProd= new Produtos();
$objProd->setIdProduto($idProduto);
$objDP= new DadosProduto();
$lista=$objDP->traeUno($objProd);

/*var_dump($lista);
print_r($lista);*/
?>

<form name="editarForm" action="editarOk.php" method="POST">
    <label>Nome</label>
    <input type="text" name="NomeProduto" value="<?php echo $lista['NomeProduto'];?>" required/><br>
    <label>Preço</label>
    <input type="number" name="PrecoProduto" step="0.01" value="<?php echo $lista['PrecoProduto'];?>" required/><br>
    <label>Comentario</label><br>
    <textarea  size="40" rows="4" type="text" name="ComentarioProduto"><?php echo $lista['ComentarioProduto'];?></textarea><br>
    
    <input type="hidden" name="IdProduto" value="<?php echo $lista['IdProduto'];?>"/><br>
    
    <input type="submit" name="ENVIAR"/>

    <!--<button class="enlace" role="link" onclick="window.location='listaPacienes.php'">Cancelar</button><br><br> -->
</form>

