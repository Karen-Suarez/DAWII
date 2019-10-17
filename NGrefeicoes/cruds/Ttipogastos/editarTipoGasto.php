<?php
include_once '../../classes/classTipoGastos.php';
 $IdTipoGasto = $_GET['IdTipoGasto'];
 
 $objTG= new TipoGastos();
 $objTG->setIdTipoGasto($IdTipoGasto);
 $objDtg= new dadosTipoGastos();
 $lista=$objDtg->traeUno($objTG);
 
 ?>
<form method="POST" action="editarok.php">
    <label>Nome</label><br>
    <input type="text" name="NomeTipoGasto" value="<?php echo $lista['NomeTipoGasto'];?>"><br>
    <label>Comentario</label><br>
    <textarea type="text" name="ComentarioTipoGasto"> <?php echo $lista['ComentarioTipoGasto'];?> </textarea><br>
    
    <input type="hidden" name="IdTipoGasto" value="<?php echo $lista['IdTipoGasto'];?>">
    <input type="submit" value="editar">
    
</form>