<?php 
    include_once "topo.php";
?>
          	<h3><i class="fa fa-angle-right"></i> PRODUTO </h3>
          	
          	<!-- FROMULARIO DE VENDAS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> INSERIR PRODUTO</h4>
                      <form class="form-horizontal style-form" action="rInsertProduto.php" method="POST">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">NOME MODIFICADO!!!</label>
                              <div class="col-sm-10">
                                  <input  type="text" name="nomeProduto" class="form-control">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">PREÇO</label>
                              <div class="col-sm-10">
                                  <input step="0.01" type="number" name="precoProduto" placeholder="Preço sem simbolo R$" class="form-control">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">COMENTARIO</label>
                              <div class="col-sm-10">
                                  <input type="text" name="comentarioProd" class="form-control">
                              </div>
                          </div>
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

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
