<?php
include_once "topo.html";

include_once '../../classes/classTipoGastos.php';
$IdTipoGasto = $_GET['IdTipoGasto'];

$objTG = new TipoGastos();
$objTG->setIdTipoGasto($IdTipoGasto);
$objDtg = new dadosTipoGastos();
$lista = $objDtg->traeUno($objTG);
?>
<h3><i class="fa fa-angle-right"></i> TIPO DE GASTOS</h3>

<!-- FROMULARIO DE VENDAS -->
<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> INSERIR TIPO DE GASTOS</h4>
            <form class="form-horizontal style-form" method="POST" action="editarTG_ok.php">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">NOME</label>
                    <div class="col-sm-10">
                        <input type="text" name="NomeTipoGasto" value="<?php echo $lista['NomeTipoGasto'];?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">COMENTARIO</label>
                    <div class="col-sm-10">
                        <input  type="text" name="ComentarioTipoGasto"  value="<?php echo $lista['ComentarioTipoGasto'];?>"  class="form-control">
                    </div>
                </div>
                <input type="hidden" name="IdTipoGasto" value="<?php echo $lista['IdTipoGasto'];?>">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Enviar</button>
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
