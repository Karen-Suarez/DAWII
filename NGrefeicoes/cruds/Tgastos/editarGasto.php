<?php
include_once '../../classes/classGastos.php';
$idGasto= $_GET['IdGasto'];
$objGasto = new Gastos();
$objGasto->setIdGasto($idGasto);
$objDG= new DadosGastos();
$lista= $objDG->traeUno($objGasto);

?>

<form action="editarOk.php" method="POST">
    <label>Data</label>
    <input type="date" name="DataGasto" value="<?php echo $lista['DataGasto'];?>" required/><br>
    <label>Hora</label>
    <input type="time" name="HoraGasto" value="<?php echo $lista['HoraGasto'];?>" required/><br>
    <label>Valor</label>
    <input type="number" name="ValorGasto" step="0.01" value="<?php echo $lista['ValorGasto'];?>" required/><br>
    <label>Comentario</label><br>
    <textarea  size="40" rows="4" type="text" name="ComentarioGasto"><?php echo $lista['ComentarioGasto'];?></textarea><br>
    <label>Tipo de Gasto</label><br>
    <input type="text" value="<?php echo $lista['NomeTipoGasto'];?>" disabled/><br>
    
    <input type="hidden" name="IdGasto" value="<?php echo $lista['IdGasto'];?>"/><br>
    
    <input type="submit" name="Editar"/>
</form>