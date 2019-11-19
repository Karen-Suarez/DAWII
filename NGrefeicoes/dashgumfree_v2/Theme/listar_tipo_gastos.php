<?php 
include_once "topo.html";
include_once '../../classes/classTipoGastos.php';
 
 $listaTipoGasto = new TipoGastos();
 $lista =  new dadosTipoGastos();
 $l=$lista->ListarTipoGastos($listaTipoGasto);
 //print_r($l);
?>
          	<h3><i class="fa fa-angle-right"></i> Tipo de Gastos</h3>
		  		<div class="row mt">
			  		<div class="col-lg-12">
                      <div class="content-panel">
                      
                          <section id="unseen">
                            <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  <th>id</th>
                                  <th>Nome</th>
                                    <th>Comentario</th>
                                    
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                                    foreach ($l as $pos) {
                                        echo "<tr>";
                                        echo "<td>".$pos['IdTipoGasto']."</td>";
                                        echo "<td>".$pos['NomeTipoGasto']."</td>";
                                        echo "<td>".$pos['ComentarioTipoGasto']."</td>";
                                        echo "<td><a href='editar_tipo_gasto.php?IdTipoGasto=".$pos['IdTipoGasto']."'>Edit</a></td>";
                                        echo "<td><a href='excluir_tipo_gasto.php?IdTipoGasto=".$pos['IdTipoGasto']."'>Delete</a></td>";
                                        echo "</tr>";
                                    }
                                    ?>
                              </tbody>
                          </table>
                          </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->			
		  	</div><!-- /row -->
		  	
		  	

		<?php include_once "rodape.html" ?>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    

  </body>
</html>
