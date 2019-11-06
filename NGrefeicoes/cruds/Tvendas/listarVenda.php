<?php
include_once '../../classes/classVendas.php';

$listarVenda = new Vendas();
$lista = new DadosVenda();
$li = $lista->listar($listarVenda);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>NGrefeicoes tipo gastos</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../../estilos/estilo.css"/>
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
            <table border>
                <thead>
                <td>Id</td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDATA&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </td><td>&nbspQuantidade&nbsp</td><td>Preco&nbspUnitario</td><td>&nbspNome&nbsp&nbspProduto&nbsp</td>
                </thead>
                <tbody>
                    <?php
                    foreach ($li as $pos) {
                        echo "<tr>";
                        echo "<td>" . $pos['IdVenda'] . "</td>";
                        echo "<td>" . $pos['DataVenda'] . "</td>";
                        echo "<td>&nbsp" . $pos['QuantidadeVenda'] . "&nbsp</td>";
                        echo "<td>R$&nbsp" . $pos['PrecoVenda'] . "</td>";
                        echo "<td>" . $pos['NomeProduto'] . "</td>";
                        
                        echo "<td><a href='editarVenda.php?IdVenda=" . $pos['IdVenda'] . "'>Edit</a></td>";
                        echo "<td><a href='excluirVenda.php?IdVenda=" . $pos['IdVenda'] . "'>Delete</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
