<?php
 include_once '../../classes/classGastos.php';
 //include_once '../../classes/classTipoGastos.php';
 
 $listaGasto = new Gastos();
 $lista =  new DadosGastos();
 $l=$lista->listar($listaGasto);
 
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
                <td>Id</td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDATA&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </td><td>&nbspHORA&nbsp</td><td>VALOR&nbspGASTO</td><td>COMENTARIO</td><td>LUGAR&nbsp/&nbspTIPO</td>
            </thead>
            <tbody>
                <?php
                    foreach ($l as $pos) {
                        echo "<tr>";
                        echo "<td>".$pos['IdGasto']."</td>";
                        echo "<td>".$pos['DataGasto']."</td>";
                        echo "<td>&nbsp".$pos['HoraGasto']."&nbsp</td>";
                        echo "<td>R$&nbsp".$pos['ValorGasto']."</td>";
                        echo "<td>".$pos['ComentarioGasto']."</td>";
                        echo "<td>".$pos['NomeTipoGasto']."</td>";
                        echo "<td><a href='editarGasto.php?IdGasto=".$pos['IdGasto']."'>Edit</a></td>";
                        echo "<td><a href='excluirGasto.php?IdGasto=".$pos['IdGasto']."'>Delete</a></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
