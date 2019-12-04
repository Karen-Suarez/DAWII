<?php 
    include_once "topo.php";
?>
<!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.html"><img src="../../img/logo.jpg" class="img-circle" width="100"></a></p>
              	  <h5 class="centered"> Nenê & Gularte r.</h5>
              	  	
                  <li class="mt">
                      <a  href="index.php">
                          <i class="fa fa-dashboard"></i>
                          <span>HOME</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>VENDAS</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="insert_vendas.php">Adicionar Vendas</a></li>
                          <li><a  href="listar_vendas.php">Lista das vendas</a></li>
                          <li><a  href="#">Buscar Vendas</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>GASTOS</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="insert_gastos.php">Adicionar Gasto</a></li>
                          <li><a  href="listar_gastos.php">Lista de Gastos</a></li>
                          <li><a  href="#">buscar</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>PRODUTOS</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="insert_produto.php">Adicionar Novo Produto</a></li>
                          <li><a  href="listar_produtos.php">Lista de produtos</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>TIPO GASTO</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="insert_tipo_gastos.php">Adicionar Novo Tipo de Gasto</a></li>
                          <li><a  href="listar_tipo_gastos.php">Lista de Tipo de gastos</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Data Tables</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="basic_table.php">Basic Table</a></li>
                          <li><a  href="responsive_table.html">Responsive Table</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Charts</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="morris.html">Morris</a></li>
                          <li><a  href="chartjs.html">Chartjs</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Data Tables</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="basic_table.html">Basic Table</a></li>
                          <li><a  href="responsive_table.html">Responsive Table</a></li>
                      </ul>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
            
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">

<?php
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
