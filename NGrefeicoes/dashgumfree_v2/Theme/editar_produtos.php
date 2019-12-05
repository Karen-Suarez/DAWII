<?php
include_once "topo.php";

include_once '../../classes/classProdutos.php';
$IdTipoGasto = $_GET['IdProduto'];

$objProd = new Produtos();
$objProd->setIdProduto($IdTipoGasto);
$objDprod = new DadosProduto();
$lista = $objDprod->traeUno($objProd);
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
                    <span>SALDO</span>
                </a>
                <ul class="sub">
                    <li><a  href="calculosSaldos.php">Calcular Saldo</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-desktop"></i>
                    <span>VENDAS</span>
                </a>
                <ul class="sub">
                    <li><a  href="insert_vendas.php">Adicionar Vendas</a></li>
                    <li><a  href="listar_vendas.php">Lista de Todas as vendas</a></li>
                    <li><a  href="buscarVendaXdata.php">Buscar Vendas x datas</a></li>
                    <li><a  href="buscarVendaXproduto.php">Buscar Vendas x Produto</a></li>
                    <li><a  href="buscarVendaXdataEproduto.php">Buscar x Data/Produto</a></li>
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
                    <li><a  href="buscarGastoXdata.php">Buscar gasto x Data</a></li>
                    <li><a  href="buscarGastoXdataEnome.php">Buscar gasto x Data/nome</a></li>
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
                    <li><a  href="insert_tipo_gastos.php">Adicionar Tipo de Gasto</a></li>
                    <li><a  href="listar_tipo_gastos.php">Lista de Tipo de gastos</a></li>
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
                                <input type="text" name="NomeProduto" value="<?php echo $lista['NomeProduto']; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">PREÇO</label>
                            <div class="col-sm-10">
                                <input  type="number" step="0.01" name="PrecoProduto"  value="<?php echo $lista['PrecoProduto']; ?>"  class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">COMENTARIO</label>
                            <div class="col-sm-10">
                                <input  type="text" name="ComentarioProduto"  value="<?php echo $lista['ComentarioProduto']; ?>"  class="form-control">
                            </div>
                        </div>
                        <input type="hidden" name="IdProduto" value="<?php echo $lista['IdProduto']; ?>">
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
