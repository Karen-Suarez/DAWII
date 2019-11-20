<?php 
    include_once "topo.php";
    include_once "../../classes/classVendas.php";
    $listarVenda = new Vendas();
    $lista = new DadosVenda();
    $li = $lista->listar($listarVenda);
?>
          	<h3><i class="fa fa-angle-right"></i> Responsive Table Examples</h3>
		  		<div class="row mt">
			  		<div class="col-lg-12">
                      <div class="content-panel">
                      <h4><i class="fa fa-angle-right"></i> Vendas</h4>
                          <section id="unseen">
                            <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  <th>id</th>
                                  <th>Data</th>
                                      <th class="numeric">Quantidade</th>
                                      <th class="numeric">Preco</th>
                                      <th class="numeric">Nome</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                                    foreach ($li as $pos) {
                                        echo "<tr>";
                                        echo "<td>" . $pos['IdVenda'] . "</td>";
                                        echo "<td>" . $pos['DataVenda'] . "</td>";
                                        echo "<td>&nbsp" . $pos['QuantidadeVenda'] . "&nbsp</td>";
                                        echo "<td>R$&nbsp" . $pos['PrecoVenda'] . "</td>";
                                        echo "<td>" . $pos['NomeProduto'] . "</td>";
                        
                                        echo "<td><a href='editarVenda.php?IdVenda=" . $pos['IdVenda'] . "'>Edit</a></td>";
                                        echo "<td><a href='excluirVenda.php?IdVenda=" . $pos['IdVenda'] . "'>Delete</a></td>";
                                        echo "</tr>";
                                    }
                                    ?>
                              </tbody>
                          </table>
                          </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->			
		  	</div><!-- /row -->
		  	
		  	<div class="row mt">
              <div class="col-lg-12">
                      <div class="content-panel">
						  <h4><i class="fa fa-angle-right"></i> No More Table</h4>
                          <section id="no-more-tables">
                              <table class="table table-bordered table-striped table-condensed cf">
                                  <thead class="cf">
                                  <tr>
                                      <th>Code</th>
                                      <th>Company</th>
                                      <th class="numeric">id</th>
                                      <th class="numeric">Data</th>
                                      <th class="numeric">Quantidade</th>
                                      <th class="numeric">Preco</th>
                                      <th class="numeric">Nome</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                    foreach ($li as $pos) {
                                        echo "<tr>";
                                        echo "<td>" . $pos['IdVenda'] . "</td>";
                                        echo "<td>" . $pos['DataVenda'] . "</td>";
                                        echo "<td>&nbsp" . $pos['QuantidadeVenda'] . "&nbsp</td>";
                                        echo "<td>R$&nbsp" . $pos['PrecoVenda'] . "</td>";
                                        echo "<td>" . $pos['NomeProduto'] . "</td>";
                        
                                        echo "<td><a href='editarVenda.php?IdVenda=" . $pos['IdVenda'] . "'>Edit</a></td>";
                                        echo "<td><a href='excluirVenda.php?IdVenda=" . $pos['IdVenda'] . "'>Delete</a></td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                  </tbody>
                              </table>
                          </section>
                      </div><!-- /content-panel -->
                  </div><!-- /col-lg-12 -->
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
