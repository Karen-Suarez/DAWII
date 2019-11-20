<?php
include_once "topo.php";

include_once '../../classes/classGastos.php';
include_once '../../classes/classTipoGastos.php';
$idGasto = $_GET['IdGasto'];
$objGasto = new Gastos();
$objGasto->setIdGasto($idGasto);
$objDG = new DadosGastos();
$lista = $objDG->traeUno($objGasto);

$objTipoGasto = new TipoGastos();
$objDTG = new dadosTipoGastos();
$listaTipoGasto = $objDTG->ListarTipoGastos($objTipoGasto);
?>
<h3><i class="fa fa-angle-right"></i>GASTOS</h3>

<!-- FROMULARIO DE PRODUTOS -->
<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> EDITAR GASTO</h4>
            <form class="form-horizontal style-form" method="POST" action="editarGasto_ok.php">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Data</label>
                    <div class="col-sm-10">
                        <input type="date" name="DataGasto" value="<?php echo $lista['DataGasto']; ?>" required class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Hora</label>
                    <div class="col-sm-10">
                        <input  type="time" name="HoraGasto" value="<?php echo $lista['HoraGasto']; ?>" required  class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Valor</label>
                    <div class="col-sm-10">
                        <input  type="number" name="ValorGasto" step="0.01" value="<?php echo $lista['ValorGasto']; ?>" required class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Comentario</label>
                    <div class="col-sm-10">
                        <input  type="text" name="ComentarioGasto" value="<?php echo $lista['ComentarioGasto']; ?>" required class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Tipo de Gasto</label>
                    <div class="col-sm-10">
                        <select name="TipoGasto" class="form-control">
                            <option value="<?php echo $lista['IdTipoGastoFk']; ?>"><?php echo $lista['NomeTipoGasto']; ?></option>
                            <?php
                            foreach ($listaTipoGasto as $linha) {
                                echo"<option value='$linha[IdTipoGasto]'>$linha[NomeTipoGasto]</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                
                <input type="hidden" name="IdGasto" value="<?php echo $lista['IdGasto'];?>"/><br>

                <button type="submit" class="btn btn-primary btn-lg btn-block">Editar</button>
            </form>
        </div>
    </div><!-- col-lg-12-->      	
</div><!--FROMULARIO DE VENDAS FIM -->

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
