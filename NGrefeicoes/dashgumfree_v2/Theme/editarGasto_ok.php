<?php
include_once './topo.php';
include_once '../../classes/classProdutos.php';
include_once '../../classes/classGastos.php';

$data = $_POST['DataGasto'];
$hora = $_POST['HoraGasto'];
$valor = $_POST['ValorGasto'];
$comentario = $_POST['ComentarioGasto'];
$id = $_POST['IdGasto'];
$TipoGasto = $_POST['TipoGasto'];

$objG = new Gastos();
$objG->setDataGasto($data);
$objG->setHoraGasto($hora);
$objG->setValorGasto($valor);
$objG->setComentarioGasto($comentario);
$objG->setIdGasto($id);
$objG->setIdTipoGastoFk($TipoGasto);
$objDG = new DadosGastos();

if ($objDG->editar($objG)) {
    //echo 'DADOS EDITADOS COM SUCESSO';
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

            <div class="showback">
                <h4> Dados editados com sucesso!!!</h4>
                <div class="btn-group btn-group-justified">
                    <div class="btn-group">
                        <button type="button" class="btn btn-theme" onclick="window.location = 'listar_gastos.php'">Voltar pra lista</button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-theme" onclick="window.location = 'index.php'">Pagina Principal</button>
                    </div>
                </div>      				
            </div><!--/showback -->

<?php
    include_once './rodape.html';
}