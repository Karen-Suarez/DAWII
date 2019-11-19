<?php
include_once "topo.html";

include_once '../../classes/classProdutos.php';
$IdTipoGasto = $_GET['IdProduto'];

$objProd = new Produtos();
$objProd->setIdProduto($IdTipoGasto);
$objDprod = new DadosProduto();
$lista = $objDprod->traeUno($objProd);
?>
<h3><i class="fa fa-angle-right"></i> Produtos</h3>

<!-- FROMULARIO DE PRODUTOS -->
<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> EDITAR PRODUTO</h4>
            <form class="form-horizontal style-form" method="POST" action="editarProd_ok.php">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">NOME</label>
                    <div class="col-sm-10">
                        <input type="text" name="NomeProduto" value="<?php echo $lista['NomeProduto'];?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">PREÇO</label>
                    <div class="col-sm-10">
                        <input  type="number" step="0.01" name="PrecoProduto"  value="<?php echo $lista['PrecoProduto'];?>"  class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">COMENTARIO</label>
                    <div class="col-sm-10">
                        <input  type="text" name="ComentarioProduto"  value="<?php echo $lista['ComentarioProduto'];?>"  class="form-control">
                    </div>
                </div>
                <input type="hidden" name="IdProduto" value="<?php echo $lista['IdProduto'];?>">
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
