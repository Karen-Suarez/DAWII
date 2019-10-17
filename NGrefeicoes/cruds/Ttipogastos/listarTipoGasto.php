<?php
 include_once '../../classes/classTipoGastos.php';
 

 $listaTipoGasto = new TipoGastos();
 $lista =  new dadosTipoGastos();
 $l=$lista->ListarTipoGastos($listaTipoGasto);
 //print_r($l);
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
                <td>Id</td><td>Nome do Gasto</td><td>Comentario</td>
            </thead>
            <tbody>
                <?php
                    foreach ($l as $pos) {
                        echo "<tr>";
                        echo "<td>".$pos['IdTipoGasto']."</td>";
                        echo "<td>".$pos['NomeTipoGasto']."</td>";
                        echo "<td>".$pos['ComentarioTipoGasto']."</td>";
                        echo "<td><a href='editarTipoGasto.php?IdTipoGasto=".$pos['IdTipoGasto']."'>Edit</a></td>";
                        echo "<td><a href='excluirTipoGasto.php?IdTipoGasto=".$pos['IdTipoGasto']."'>Delete</a></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
