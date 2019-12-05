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
        <?php
        include_once '../../classes/classGastos.php';
        include_once '../../classes/classTipoGastos.php';
        $idGasto = $_GET['IdGasto'];
        $objGasto = new Gastos();
        $objGasto->setIdGasto($idGasto);
        $objDG = new DadosGastos();
        $lista = $objDG->traeUno($objGasto);

        $objTipoGasto = new TipoGastos();
        $objDTG = new dadosTipoGastos();
        $listaTipoGasto = $objDTG->ListarTipoGastos($objTipoGasto);
        ?>
        <h3><i class="fa fa-angle-right"></i> GASTOS</h3>

        <!-- FROMULARIO DE VENDAS -->
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> INCLUIR GASTOS</h4>
                    <form class="form-horizontal style-form" action="editarOk.php" method="POST">

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">ESCOLHA O TIPO DE GASTO</label>
                            <div class="col-sm-10">

                                <select name="TipoGasto" class="form-control">
                                    <option value="<?php echo $lista['IdTipoGastoFk']; ?>"><?php echo $lista['NomeTipoGasto']; ?></option>
                                    <?php
                                    foreach ($listaTipoGasto as $linha) {
                                        echo"<option value='$linha[IdTipoGasto]'>$linha[NomeTipoGasto]</option>";
                                    }
                                    ?>
                                </select> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">DATA</label>
                            <div class="col-sm-10">
                                <input type="date" name="DataGasto" class="form-control" value="<?php echo $lista['DataGasto']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">HORA</label>
                            <div class="col-sm-10">
                                <input type="time" name="HoraGasto" class="form-control" value="<?php echo $lista['HoraGasto']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">VALOR</label>
                            <div class="col-sm-10">
                                <input type="number" name="ValorGasto" step="0.01" class="form-control" value="<?php echo $lista['ValorGasto']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">COMENTARIO</label>
                            <div class="col-sm-10">
                                <input type="text" name="ComentarioGasto" class="form-control" <?php echo $lista['ComentarioGasto']; ?> >
                            </div>
                        </div>

                        <input type="hidden" name="IdGasto" value="<?php echo $lista['IdGasto']; ?>"/><br>

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
