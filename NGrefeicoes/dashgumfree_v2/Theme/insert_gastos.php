<?php 
    include_once "topo.php";
    include_once '../../classes/classTipoGastos.php';
    $objTipoGasto = new TipoGastos();
    $lista = new dadosTipoGastos();
    $l = $lista->ListarTipoGastos($objTipoGasto);
?>
          	<h3><i class="fa fa-angle-right"></i> GASTOS</h3>
          	
          	<!-- FROMULARIO DE VENDAS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> INCLUIR GASTOS</h4>
                      <form class="form-horizontal style-form" method="POST" action="RinsertGasto.php">

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">ESCOLHA O TIPO DE GASTO</label>
                              <div class="col-sm-10">
                              <select name="idTipoGastoFk" class="form-control">
                                <option value="">Selecione</option>
                                <?php
                                foreach ($l as $linha) {
                                    echo"<option value='$linha[IdTipoGasto]'>$linha[NomeTipoGasto]</option>";
                                    }
                                ?>
                              </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">DATA</label>
                              <div class="col-sm-10">
                                  <input type="date" name="dataGasto" class="form-control">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">HORA</label>
                              <div class="col-sm-10">
                                  <input type="time" name="horaGasto"  class="form-control">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">VALOR</label>
                              <div class="col-sm-10">
                                  <input type="number" step="0.01" name="valorGasto" placeholder="valor sem simbolo R$" class="form-control">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">COMENTARIO</label>
                              <div class="col-sm-10">
                                  <input name="comentarioGasto" placeholder="Digite algum comentario se desejar." class="form-control">
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

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
