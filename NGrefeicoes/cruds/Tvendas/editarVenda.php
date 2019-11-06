<?php
include_once '../../classes/classVendas.php';
include_once '../../classes/classProdutos.php';
$idVenda = $_GET['IdVenda'];
$objVenda = new Vendas();
$objVenda->setIdVenda($idVenda);
$objDV = new DadosVenda();
$lista = $objDV->traeUno($objVenda);

$objProd = new Produtos();
$objDP = new DadosProduto();
$listaProduto = $objDP->listar($objProd);
?>

<form action="editarVendaOk.php" method="POST">
    <label>Data</label>
    <input type="date" name="DataVenda" value="<?php echo $lista['DataVenda']; ?>" required/><br>
    <label>Quantidade</label>
    <input type="number" name="Quantidade" value="<?php echo $lista['QuantidadeVenda']; ?>" required/><br>
    <label>Preco</label>
    <input type="number" name="Preco" step="0.01" value="<?php echo $lista['PrecoVenda']; ?>" required/><br>
    <label>Produto</label><br>

    <select name="Produto">
        <option value="<?php echo $lista['IdProdutoFk']; ?>"><?php echo $lista['NomeProduto']; ?></option>
        <?php
        foreach ($listaProduto as $linha) {
            echo"<option value='$linha[IdProduto]'>$linha[NomeProduto]</option>";
        }
        ?>
    </select>

    <input type="hidden" name="IdVenda" value="<?php echo $lista['IdVenda']; ?>"/><br>

    <input type="submit" value="Editar"/>
</form>