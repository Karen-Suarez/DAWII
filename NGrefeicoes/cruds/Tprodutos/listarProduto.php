<?php
include_once '../../classes/classProdutos.php';
$objProduto= new Produtos();
$lista= new DadosProduto;
$l= $lista->listar($objProduto);
?>
 <!DOCTYPE html>
 <html>
 <head>
    <title>NGrefeicoes Produtos</title>
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
                <td>Id</td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspNome&nbspProduto&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </td><td>&nbsp&nbspPreço&nbsp&nbsp</td><td>&nbspComentario&nbsp</td>
            </thead>
            <tbody>
                <?php
                    foreach ($l as $pos) {
                        echo "<tr>";
                        echo "<td>".$pos['IdProduto']."</td>";
                        echo "<td>".$pos['NomeProduto']."</td>";
                        echo "<td>R$&nbsp".$pos['PrecoProduto']."&nbsp</td>";
                        echo "<td>&nbsp".$pos['ComentarioProduto']."</td>";
                        echo "<td><a href='editarProduto.php?IdProduto=".$pos['IdProduto']."'>Edit</a></td>";
                        echo "<td><a href='excluirProduto.php?IdProduto=".$pos['IdProduto']."'>Delete</a></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>