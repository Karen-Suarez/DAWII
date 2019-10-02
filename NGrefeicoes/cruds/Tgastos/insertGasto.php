<?php
include_once '../../classes/classTipoGastos.php';
$objTipoGasto = new TipoGastos();
$lista = new dadosTipoGastos();
$l = $lista->ListarTipoGastos($objTipoGasto);
?>
<html>

    <head>
        <title>GASTOS</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../../estilos/estilo.css" />
    </head>

    <body>
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
        <div class="conteudo">

            <fieldset>
                <legend>
                    <h1>Inserir Gasto</h1>
                </legend>
                <form method="POST" action="RinsertGasto.php">
                    <label>Escolha o tipo de Gasto</label>
                    <select name="idTipoGastoFk">
                        <option value="">Selecione</option>
                        <?php
                        foreach ($l as $linha) {
                            echo"<option value='$linha[IdTipoGasto]'>$linha[NomeTipoGasto]</option>";
                        }
                        ?>
                    </select>
                    <label>Data</label>
                    <input type="date" name="dataGasto">
                    <label>Hora</label>
                    <input type="time" name="horaGasto">
                    <label>Valor</label>
                    <input type="number" step="0.01" name="valorGasto" placeholder="valor sem simbolo R$">
                    <label>Comentario</label>
                    <textarea name="comentarioGasto" placeholder="Digite algum comentario se desejar."></textarea>
                    <button type="submit">Enviar</button>
                </form>
            </fieldset>

        </div>
    </body>
</html>