<?php 
    include_once "topo.html";
    include_once '../../classes/classProdutos.php';
$objProduto= new Produtos();
$lista= new DadosProduto;
$l= $lista->listar($objProduto);
?>
          	<h3><i class="fa fa-angle-right"></i>Produtos</h3>
		  		<div class="row mt">
			  		<div class="col-lg-12">
                      <div class="content-panel">
                      <h4><i class="fa fa-angle-right"></i> Lista de Produtos</h4>
                          <section id="unseen">
                            <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                    <th>id</th>
                                    <th>Nome</th>
                                    <th>Preco</th>
                                    <th >Comentario</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                                    foreach ($l as $pos) {
                                        echo "<tr>";
                                        echo "<td>".$pos['IdProduto']."</td>";
                                        echo "<td>".$pos['NomeProduto']."</td>";
                                        echo "<td>R$&nbsp".$pos['PrecoProduto']."&nbsp</td>";
                                        echo "<td>&nbsp".$pos['ComentarioProduto']."</td>";
                                        echo "<td><a href='editar_produtos.php?IdProduto=".$pos['IdProduto']."'>Edit</a></td>";
                                        echo "<td><a href='excluir_produto.php?IdProduto=".$pos['IdProduto']."'>Delete</a></td>";
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
