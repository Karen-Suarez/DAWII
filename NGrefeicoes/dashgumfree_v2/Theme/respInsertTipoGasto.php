<?php
include_once './topo.php';
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
include_once '../../classes/classTipoGastos.php';

$nomeTgasto = $_POST['nomeTgasto'];
$comentarioTgasto = $_POST['comentarioTgasto'];

$tipoGasto = new TipoGastos();
$tipoGasto->setNomeTipoGasto($nomeTgasto);
$tipoGasto->setComentarioTipoGasto($comentarioTgasto);
$insert = new dadosTipoGastos();
$insertok = $insert->insert($tipoGasto);

if ($insertok) {
    ?>

    <div class="showback">
        <h4> Dados incluidos com sucesso</h4>
        <div class="btn-group btn-group-justified">
            <div class="btn-group">
                <button type="button" class="btn btn-theme" onclick="window.location='insert_tipo_gastos.php'">Adicionar mais</button>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-theme" onclick="window.location='listar_tipo_gastos.php'">Lista de T. Gastos</button>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-theme" onclick="window.location='index.php'">Pagina Principal</button>
            </div>
        </div>      				
    </div><!--/showback -->

    <?php
    
    //header('Location: insertTipoGasto.html');
} else {
    echo"DEU ERRO";
}

include_once './rodape.html';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

