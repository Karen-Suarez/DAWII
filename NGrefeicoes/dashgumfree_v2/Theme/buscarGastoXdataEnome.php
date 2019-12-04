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
                    <label class="col-sm-2 col-sm-2 control-label">Nome do Gasto</label>
                    <div class="col-sm-10">
                        <input type="text" name="nomeGasto" placeholder="Nome do Gasto" required class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Data inicial</label>
                    <div class="col-sm-10">
                        <input type="date" name="dataI" required class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Data Final</label>
                    <div class="col-sm-10">
                        <input type="date" name="dataF" required class="form-control">
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
include_once '../../classes/classGastos.php';
if (isset($_POST['nomeGasto']) && isset($_POST['dataI']) && isset($_POST['dataF'])) {
    $NomeGasto = $_POST['nomeGasto'];
    $dataI = $_POST['dataI'];
    $dataF = $_POST['dataF'];

    $objGasto = new Gastos();
    $objBusca = new DadosGastos();
    $buscar = $objBusca->buscarGastoXtipoGastoEdata($objGasto, $dataI, $dataF, $NomeGasto)
    ?>
<table border="2" class="table table-bordered table-striped table-condensed"><p> <h4>Busca por : " <?php echo $NomeGasto ; ?> "</h4></p>
         <thead><th>Nome</th>  <th>Data</th><th>Valor Gasto</th><th>Comentario</th></thead>
    <tbody>
        <?php
        if ($buscar == array()) {
            echo "NO HAY CONSULTAS VINCULADAS AL PRODUCTO O FECHA' {$NomeGasto} '";
        } else {
            foreach ($buscar as $linha) {
                echo "<tr>";
                /*echo "<td>" . $linha['IdGasto'] . "</td>";*/
                echo "<td>" . $linha['NomeTipoGasto'] . "</td>";
                echo "<td>" . $linha['DataGasto'] . "</td>";
                echo "<td>" . $linha['ValorGasto'] . "</td>";
                echo "<td>" . $linha['ComentarioGasto'] . "</td>";
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