<?php

class TipoGastos {

    private $IdTipoGasto;
    private $NomeTipoGasto;
    private $ComentarioTipoGasto;

    public function __construct(/* $IdTipoGastop,$NomeTipoGastop */) {
        // $this->IdTipoGasto = $IdTipoGastop;
        //$this->NomeTipoGasto = $NomeTipoGastop;
    }

// getters
    public function getIdTipoGasto() {
        return $this->IdTipoGasto;
    }
    public function getNomeTipoGasto() {
        return $this->NomeTipoGasto;
    }
    public function getComentarioTipoGasto() {
        return $this->ComentarioTipoGasto;
    }

// setter
    public function setNomeTipoGasto($NomeTipoGasto) {
        $this->NomeTipoGasto = $NomeTipoGasto;
    }
    public function setComentarioTipoGasto($ComentarioTipoGasto) {
        $this->ComentarioTipoGasto = $ComentarioTipoGasto;
    }

}

class dadosTipoGastos {

    public function insert($tipoGasto) {
        $connectPDO;
        try {
            $connectPDO = new PDO('mysql:host=localhost;dbname=ngrefeicoes', 'root', ''); //conexao c/ banco
            $connectPDO->beginTransaction(); //inicia la trans. c/ bd.
            $sqlInsert = "INSERT INTO tipogastos  (NomeTipoGasto, ComentarioTipoGasto) VALUES (:NomeTipoGasto, :ComentarioTipoGasto)"; //SQL sentence
            $preparedStm = $connectPDO->prepare($sqlInsert); //Prepare(): prepara la sentencia SQL para luego ser ejecutada por el método execute().
            $preparedStm->bindValue(":NomeTipoGasto", $tipoGasto->getNomeTipoGasto()); //Vincula un parámetro al nombre de variable especificado.
            $preparedStm->bindValue(":ComentarioTipoGasto", $tipoGasto->getComentarioTipoGasto());

            if ($preparedStm->execute() == true) {
                $connectPDO->commit(); //Consigna una transacción. devuelve la conexión al modo auto commit hasta que una nueva llamada beginTransaction() inicie una nueva transacción.
                return true;
            } else {
                throw new PDOException("Error Processing Request" . $preparedStm->errorCode() . "-" . implode($preparedStm->errorInfo()));
            }
            $connectPDO->commit(); //Consigna una transacción. devuelve la conexión al modo auto commit hasta que una nueva llamada beginTransaction() inicie una nueva transacción.
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        } finally {
            if (isset($connectPDO)) {
                unset($connectPDO);
            }
        }
    }

    public function ListarTipoGastos($tipoGasto) {
        $connectPDO;
        try {
            $connectPDO = new PDO('mysql:host=localhost;dbname=ngrefeicoes', 'root', '');
            $connectPDO->beginTransaction();
            $sqlSelect = "SELECT IdTipoGasto, NomeTipoGasto,ComentarioTipoGasto FROM tipogastos";
            $preparedStm = $connectPDO->prepare($sqlSelect);
            $preparedStm->execute();
            if ($preparedStm->execute() == true) {
                return $preparedStm->fetchAll();
                $connectPDO->commit();
            } else {
                throw new PDOException("Error Processing Request" . $preparedStm->errorCode() . "-" . implode($preparedStm->errorInfo()));
            }
            $connectPDO->commit();
        } catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            if (isset($connectPDO)) {
                unset($connectPDO);
            }
        }
    }

    public function ExcluirTipoGastos($IdTipoGastoParam) {
        $connectPDO;
        try {
            $connectPDO = new PDO('mysql:host=localhost;dbname=ngrefeicoes', 'root', '');
            $connectPDO->beginTransaction();
            $sqlDelete = "DELETE FROM tipogastos WHERE IdTipoGasto= :IdTipoGasto";
            $preparedStm = $connectPDO->prepare($sqlDelete);
            $preparedStm->bindValue(":IdTipoGasto", $IdTipoGastoParam);
            $preparedStm->execute();

            if ($preparedStm->execute() == true) {
                $connectPDO->commit();
                return true;
            } else {
                throw new PDOException("Error Processing Request" . $preparedStm->errorCode() . "-" . implode($preparedStm->errorInfo()));
            }
            $connectPDO->commit();
        } catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            if (isset($connectPDO)) {
                unset($connectPDO);
            }
        }
    }

    public function EditarTipoGastos($NomeTipoGastoParam, $IdTipoGastoParam) {
        $connectPDO;
        try {
            $connectPDO = new PDO('mysql:host=localhost;dbname=ngrefeicoes', 'root', '');
            $connectPDO->beginTransaction();
            $sqlUpdate = "UPDATE tipogasos SET NomeTipoGasto = :NomeTipoGasto WHERE IdTipoGasto= :IdTipoGasto";
            $preparedstm = $connectPDO->prepare($sqlUpdate);
            $preparedstm->bindValue("NomeTipoGasto", $NomeTipoGastoParam);

            /* TERMINAAAAAAAAAAAAAAAAAAAR */
            /* TERMINAAAAAAAAAAAAAAAAAAAR */
            /* TERMINAAAAAAAAAAAAAAAAAAAR */
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        } finally {
            if (isset($connectPDO)) {
                unset($connectPDO);
            }
        }
    }

}
