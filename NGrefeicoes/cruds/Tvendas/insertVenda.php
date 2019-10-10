<?php
    include_once '../../classes/classProdutos.php';
    $objProd= new Produtos();
    $listaProd= new DadosProduto();
    $l= $listaProd->listar($objProd);
?>
<!DOCTYPE html>
<html>
<head>
    <title>VENDAS</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../estilos/estilo.css" />
</head>

<body>
    <div id="geral">
        <header>
            <nav id="contM">
                <ul id="menu">
                    <li><a href="../Ttipogastos/insertTipoGasto.html"> Inserir Tipo de Gastos</a></li>
                    <li><a href="../Tprodutos/insertProduto.html"> Inserir Produtos</a></li>
                    <li><a href="../Tgastos/insertGasto.php"> Gastos</a></li>
                    <li><a href="../Tvendas/insertVenda.php"> Vendas</a></li>
                    <li><a href="#"> Relatórios</a></li>
                    <li><a href="../../index.html">Inicio</a></li>
                </ul>
            </nav>
        </header>
    </div>
    <div class="conteudo">
        <fieldset>
            <legend>
                <h1>Vendas</h1>
            </legend>
            <form method="POST" action="rInsertVenda.php">
                <label>Escolha o Produto Vendido:</label>
                <select name="produto">
                    <option value="">Selecione</option>
                    <?php
                        foreach ($l as $linha) {
                            echo"<option value='$linha[IdProduto]'>$linha[NomeProduto]</option>";
                        }
                    ?>
                </select>
                <label>Preço Unitario prod.</label>
                <input type="number" name="preco" step="0.01" placeholder="Preço sem simbolo R$">
                <label>Quantidade Vendida:</label>
                <input type="number" name="quant" placeholder="Quantidade unitaria">
                <label>Data</label>
                <input type="date" name="data">
                
                <button type="submit">Enviar</button>
            </form>
        </fieldset>
    </div>

</body>

</html>