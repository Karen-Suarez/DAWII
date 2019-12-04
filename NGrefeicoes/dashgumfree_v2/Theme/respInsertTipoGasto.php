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

