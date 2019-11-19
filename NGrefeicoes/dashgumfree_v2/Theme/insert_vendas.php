<?php
include_once "topo.html";
include_once '../../classes/classProdutos.php';
$objProd = new Produtos();
$listaProd = new DadosProduto();
$l = $listaProd->listar($objProd);
?>
<h3><i class="fa fa-angle-right"></i> VENDAS</h3>

<!-- FROMULARIO DE VENDAS -->
<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> INCLUIR VENDAS</h4>
            <form class="form-horizontal style-form" method="post" action="rInsert_venda.php">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">DATA</label>
                    <div class="col-sm-10">
                        <input type="date" name="data" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Escolha o Produto Vendido:</label>
                    <div class="col-sm-10">
                        <select name="produto" class="form-control">
                            <option value="">Selecione</option>
                            <?php
                            foreach ($l as $linha) {
                                echo"<option value='$linha[IdProduto]'>$linha[NomeProduto]</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Quantidade Vendida:</label>
                    <div class="col-sm-10">
                        <input type="number" name="quant" placeholder="Quantidade unitaria" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Preço Unitario prod.</label>
                    <div class="col-sm-10">
                        <input type="number" name="preco" step="0.01" placeholder="Preço sem simbolo R$" class="form-control">
                    </div>
                </div>
                <div class="showback">
                                      <!--<i class="fa fa-angle-right"></i> -->
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Enviar</button>
                </div>
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
