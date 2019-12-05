<?php
include_once "topo.php";

include_once '../../classes/classVendas.php';
include_once '../../classes/classProdutos.php';
$idVenda = $_GET['IdVenda'];
$objVenda = new Vendas();
$objVenda->setIdVenda($idVenda);
$objDV = new DadosVenda();
$lista = $objDV->traeUno($objVenda);

$objProd = new Produtos();
$objDP = new DadosProduto();
$listaProduto = $objDP->listar($objProd);
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
        <h3><i class="fa fa-angle-right"></i> Vendas</h3>

        <!-- FROMULARIO DE PRODUTOS -->
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> EDITAR PRODUTO</h4>
                    <form class="form-horizontal style-form" method="POST" action="editarVenda_ok.php">
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Data</label>
                            <div class="col-sm-10">
                                <input type="date" name="DataVenda" value="<?php echo $lista['DataVenda']; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Quantidade</label>
                            <div class="col-sm-10">
                                <input  type="number" name="Quantidade"  value="<?php echo $lista['QuantidadeVenda']; ?>" required  class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">PREÇO</label>
                            <div class="col-sm-10">
                                <input  type="number" step="0.01" name="Preco"  value="<?php echo $lista['PrecoVenda']; ?>" required  class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Produto</label>
                            <div class="col-sm-10">
                                <!--<input  type="text" name="ComentarioProduto"  value=""  class="form-control">-->
                                <select name="Produto" class="form-control">
                                    <option value="<?php echo $lista['IdProdutoFk']; ?>"><?php echo $lista['NomeProduto']; ?></option>
                                    <?php
                                    foreach ($listaProduto as $linha) {
                                        echo"<option value='$linha[IdProduto]'>$linha[NomeProduto]</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <input type="hidden" name="IdVenda" value="<?php echo $lista['IdVenda']; ?>"/><br>

                        <button type="submit" class="btn btn-primary btn-lg btn-block">Editar</button>
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
