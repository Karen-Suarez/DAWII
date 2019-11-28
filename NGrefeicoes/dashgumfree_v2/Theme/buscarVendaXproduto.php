<?php
include_once 'topo.php';
?>
<!-- FROMULARIO DE VENDAS -->
<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Lista de Vendas por Produto</h4>
            <form class="form-horizontal style-form" name="form" action="#" method="POST">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Produto</label>
                    <div class="col-sm-10">
                        <input type="text" name="nomeProd" placeholder="Nome do Produto" required class="form-control">
                    </div>
                </div>
                <div class="showback">
                    <!--<i class="fa fa-angle-right"></i> -->
                    <button type="submit" class="btn btn-primary btn-lg btn-block">BUSCAR</button>
                </div>
            </form>
        </div>
    </div><!-- col-lg-12-->      	
</div><!--FROMULARIO DE VENDAS FIM -->
<?php
include_once '../../classes/classVendas.php';
if (isset($_POST['nomeProd'])) {
    $NomeProduto = $_POST['nomeProd'];

    $objVenda = new Vendas();
    $objBusca = new DadosVenda();
    $buscar = $objBusca->buscarVendaXproduto($objVenda, $NomeProduto);
    ?>
<table border="2" class="table table-bordered table-striped table-condensed"><p> <h4>Busca por : " <?php echo $NomeProduto ; ?> "</h4></p>
        <thead> <th>Id</th><th>Data</th><th>Quantidade</th><th>Preco</th><th>Produto</th> <th>TOTAL</th> </thead>
    <tbody>
        <?php
        if ($buscar == array()) {
            echo "NO HAY CONSULTAS VINCULADAS A UN NOMBRE QUE TENGA ' {$nomeBusca} '";
        } else {
            foreach ($buscar as $linha) {
                echo "<tr>";
                echo "<td>" . $linha['IdVenda'] . "</td>";
                echo "<td>" . $linha['DataVenda'] . "</td>";
                echo "<td>" . $linha['QuantidadeVenda'] . "</td>";
                echo "<td>" . $linha['PrecoVenda'] . "</td>";
                echo "<td>" . $linha['NomeProduto'] . "</td>";
                echo "<td>" . $linha['TOTAL'] . "</td>";

                //echo"<td><a href='cancelarCons.php?idConsulta=" . $linha['idConsulta'] . "'>&nbspCANCELAR&nbsp</a></td>";
                //echo"<td><a href='tratamentoConsulta.php?idConsulta=" . $linha['idConsulta'] . "'>&nbsp&nbspTRATAMENTO&nbsp</a></td>";

                echo "</tr>";
            }
        }
        ?>
    </tbody>
    </table>

<?php } ?>

<?php include_once "rodape.html"; ?>

<!--script for this page-->
<script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

<!--custom switch-->
<script src="assets/js/bootstrap-switch.js"></script>

<!--custom tagsinput-->
<script src="assets/js/jquery.tagsinput.js"></script>

<!--custom checkbox & radio-->

<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>

<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>


<script src="assets/js/form-component.js"></script>    


<script>
    //custom select box

    $(function () {
        $('select.styled').customSelect();
    });

</script>

</body>
</html>