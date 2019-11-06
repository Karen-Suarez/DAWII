<?php

class Gastos {

    private $IdGasto;
    private $DataGasto;
    private $HoraGasto;
    private $ValorGasto;
    private $ComentarioGasto;
    private $IdTipoGastoFk;

    public function __construct(/* $IdGasto,$DataGasto,$HoraGasto,$ValorGasto,$ComentarioGasto,$IdTipoGastoFk */) {
        /* $this->IdGasto = $IdGasto;
          $this->DataGasto = $DataGasto;
          $this->HoraGasto = $HoraGasto;
          $this->ValorGasto = $ValorGasto;
          $this->ComentarioGasto = $ComentarioGasto;
          $this->IdTipoGastoFk = $IdTipoGastoFk; */
    }

// getters
    public function getIdGasto() {
        return $this->IdGasto;
    }

    public function getDataGasto() {
        return $this->DataGasto;
    }

    public function getHoraGasto() {
        return $this->HoraGasto;
    }

    public function getValorGasto() {
        return $this->ValorGasto;
    }

    public function getComentarioGasto() {
        return $this->ComentarioGasto;
    }

    public function getIdTipoGastoFk() {
        return $this->IdTipoGastoFk;
    }

// setters
    public function setIdGasto($IdGasto) {
        $this->IdGasto= $IdGasto;
    }
    public function setDataGasto($DataGasto) {
        $this->DataGasto = $DataGasto;
    }

    public function setHoraGasto($HoraGasto) {
        $this->HoraGasto = $HoraGasto;
    }

    public function setValorGasto($ValorGasto) {
        $this->ValorGasto = $ValorGasto;
    }

    public function setComentarioGasto($ComentarioGasto) {
        $this->ComentarioGasto = $ComentarioGasto;
    }

    public function setIdTipoGastoFk($IdTipoGastoFk) {
        $this->IdTipoGastoFk = $IdTipoGastoFk;
    }

}

class DadosGastos {

    public function insert($gasto) {
        try {
            $connectionPDO = new PDO('mysql:host=localhost;dbname=ngrefeicoes', 'root', '');
            $connectionPDO->beginTransaction();
            $sqlInsert = "INSERT INTO gastos(DataGasto, HoraGasto, ValorGasto, ComentarioGasto, IdTipoGastoFk) VALUES(:DataGasto, :HoraGasto, :ValorGasto, :ComentarioGasto, :IdTipoGastoFk)";
            $preparedStm = $connectionPDO->prepare($sqlInsert);
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
            $connectionPDO = new PDO('mysql:host=localhost;dbname=ngrefeicoes', 'root', '');
            $connectionPDO->exec('set names utf8'); // lee caracteres especiales
            $connectionPDO->beginTransaction();
            $sqlSelect = "SELECT gastos.*, tipogastos.NomeTipoGasto FROM gastos INNER JOIN tipogastos ON gastos.IdTipoGastoFk = tipogastos.IdTipoGasto";
            $preparedStm = $connectionPDO->prepare($sqlSelect);
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

    public function traeUno($gasto) {
        $connectionPDO;
        try {
            $connectionPDO = new PDO('mysql:host=localhost;dbname=ngrefeicoes', 'root', '');
            $connectionPDO->exec('set names utf8'); // lee caracteres especiales
            $connectionPDO->beginTransaction();
            //$sqlSelect = "SELECT * FROM gastos WHERE IdGasto = :IdGasto";
            $sqlSelect="SELECT gastos.*, tipogastos.NomeTipoGasto FROM gastos INNER JOIN tipogastos ON gastos.IdTipoGastoFk = tipogastos.IdTipoGasto WHERE IdGasto = :IdGasto";
            $preparedStm = $connectionPDO->prepare($sqlSelect);
            $preparedStm->bindValue(":IdGasto", $gasto->getIdGasto());
            $preparedStm->execute();
            $linea = $preparedStm->fetch(PDO::FETCH_ASSOC); //TRAE UNA LINEA
            if ($linea) {
                $connectionPDO->commit();
                return $linea;
            } else {
                $connectionPDO->commit();
                throw new PDOException("Error Processing Request" . $preparedStm->errorCode() . "-" . implode($preparedStm->errorInfo()));
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        } finally {
            if (isset($connectionPDO)) {
                unset($connectionPDO);
            }
        }
    }

    public function editar($gasto) {
        $connectPDO;
        try {
            $connectPDO = new PDO('mysql:host=localhost;dbname=ngrefeicoes', 'root', '');
            $connectPDO->beginTransaction();
            $sqlUpdate="UPDATE gastos SET DataGasto = :DataGasto, HoraGasto = :HoraGasto, ValorGasto = :ValorGasto, ComentarioGasto = :ComentarioGasto, IdTipoGastoFk = :IdTipoGastoFk WHERE IdGasto = :IdGasto";
            $preparedStm= $connectPDO->prepare($sqlUpdate);
            $preparedStm->bindValue(":IdGasto", $gasto->getIdGasto());
            $preparedStm->bindValue(":DataGasto", $gasto->getDataGasto());
            $preparedStm->bindValue(":HoraGasto", $gasto->getHoraGasto());
            $preparedStm->bindValue(":ValorGasto", $gasto->getValorGasto());
            $preparedStm->bindValue(":ComentarioGasto", $gasto->getComentarioGasto());
            $preparedStm->bindValue(":IdTipoGastoFk", $gasto->getIdTipoGastoFk());
            
            
            if ($preparedStm->execute() == TRUE) {
                $connectPDO->commit();
                return TRUE;
            } else {
                $connectPDO->commit();
                throw new PDOException("Error Processing Request" . $preparedStm->errorCode() . "-" . implode($preparedStm->errorInfo()));
            }
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        } finally {if (isset($connectPDO)) {unset($connectPDO);} }
    }

    public function excluir($gasto) {
        try {
            $connectPDO = new PDO('mysql:host=localhost;dbname=ngrefeicoes', 'root', '');
            $connectPDO->exec('set names utf8'); // lee caracteres especiales
            $connectPDO->beginTransaction();
            $sqldelete = "DELETE FROM gastos WHERE IdGasto = :IdGasto";
            $preparedStm = $connectPDO->prepare($sqldelete);
            $preparedStm->bindValue(":IdGasto", $gasto->getIdGasto());

            if ($preparedStm->execute() == TRUE) {
                $connectPDO->commit();
                return TRUE;
            } else {
                $connectPDO->commit();
                throw new PDOException("Error Processing Request" . $preparedStm->errorCode() . "-" . implode($preparedStm->errorInfo()));
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        } finally {
            
        }
    }

}
