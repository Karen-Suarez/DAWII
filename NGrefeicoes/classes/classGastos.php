<?php 
class Gastos
{
    private $IdGasto;
    private $DataGasto;
    private $HoraGasto;
    private $ValorGasto;
    private $ComentarioGasto;
    private $IdTipoGastoFk;

    public function __construct(/*$IdGasto,$DataGasto,$HoraGasto,$ValorGasto,$ComentarioGasto,$IdTipoGastoFk*/){
       /* $this->IdGasto = $IdGasto;
        $this->DataGasto = $DataGasto;
        $this->HoraGasto = $HoraGasto;
        $this->ValorGasto = $ValorGasto;
        $this->ComentarioGasto = $ComentarioGasto;
        $this->IdTipoGastoFk = $IdTipoGastoFk;*/
    }
// getters
    public function getIdGasto(){
        return $this->IdGasto;
    }
    public function getDataGasto(){
        return $this->DataGasto;
    }
    public function getHoraGasto(){
        return $this->HoraGasto;
    }
    public function getValorGasto(){
        return $this->ValorGasto;
    }
    public function getComentarioGasto(){
        return $this->ComentarioGasto;
    }
    public function getIdTipoGastoFk(){
        return $this->IdTipoGastoFk;
    }
// setters
    public function setDataGasto($DataGasto){
        $this->DataGasto = $DataGasto;
    }
    public function setHoraGasto($HoraGasto){
        $this->HoraGasto = $HoraGasto;
    }
    public function setValorGasto($ValorGasto){
        $this->ValorGasto = $ValorGasto;
    }
    public function setComentarioGasto($ComentarioGasto){
        $this->ComentarioGasto = $ComentarioGasto;
    }
    public function setIdTipoGastoFk($IdTipoGastoFk){
        $this->IdTipoGastoFk = $IdTipoGastoFk;
    }
}
class DadosGastos {
        
    public function insert($gasto) {
        try {
            $connectionPDO= new PDO('mysql:host=localhost;dbname=ngrefeicoes', 'root', '');
            $connectionPDO->beginTransaction();
            $sqlInsert="INSERT INTO gastos(DataGasto, HoraGasto, ValorGasto, ComentarioGasto, IdTipoGastoFk) VALUES(:DataGasto, :HoraGasto, :ValorGasto, :ComentarioGasto, :IdTipoGastoFk)";
            $preparedStm= $connectionPDO->prepare($sqlInsert);
            $preparedStm->bindValue(':DataGasto', $gasto->getDataGasto());
            $preparedStm->bindValue(':HoraGasto', $gasto->getHoraGasto());
            $preparedStm->bindValue(':ValorGasto', $gasto->getValorGasto());
            $preparedStm->bindValue(':ComentarioGasto', $gasto->getComentarioGasto());
            $preparedStm->bindValue(':IdTipoGastoFk', $gasto->getIdTipoGastoFk());
            if ($preparedStm->execute() == true) {
                $connectionPDO->commit();
                return true;
            } else {
                throw new PDOException("Error Processing Request" . $preparedStm->errorCode() . "-" . implode($preparedStm->errorInfo()));
            }
            
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        } finally {
            if (isset($connectionPDO)) {
            unset($connectionPDO);
            }
        }
    }
    public function listar($gasto) {
        $connectionPDO;
        try {
            $connectionPDO= new PDO('mysql:host=localhost;dbname=ngrefeicoes', 'root', '');
            $connectionPDO->beginTransaction();
            $sqlSelect="SELECT gastos.*, tipogastos.NomeTipoGasto FROM gastos INNER JOIN tipogastos ON gastos.IdTipoGastoFk = tipogastos.IdTipoGasto";
            $preparedStm= $connectionPDO->prepare($sqlSelect);
            $preparedStm->execute();
            if ($preparedStm->execute() == true) {
                $connectionPDO->commit();
                return $preparedStm->fetchAll();
            } else {
                throw new PDOException("Error Processing Request" . $preparedStm->errorCode() . "-" . implode($preparedStm->errorInfo()));
                //$connectionPDO->commit();
            }
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        } finally {
            if (isset($connectionPDO)) {
                unset($connectionPDO);
            }
        }
        }
}
