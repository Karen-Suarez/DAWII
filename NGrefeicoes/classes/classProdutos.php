<?php

class Produtos {

    private $IdProduto;
    private $NomeProduto;
    private $PrecoProduto;
    private $ComentarioProduto;

    public function __construct(/* $IdProduto,$NomeProduto,$PrecoProduto */) {
        //$this->IdProduto = $IdProduto;
        //$this->NomeProduto = $NomeProduto;
        //$this->PrecoProduto = $PrecoProduto;
    }

// getters retornar o valor
    public function getIdProduto() {
        return $this->IdProduto;
    }

    public function getNomeProduto() {
        return $this->NomeProduto;
    }

    public function getPrecoProduto() {
        return $this->PrecoProduto;
    }

    public function getComentarioProduto() {
        return $this->ComentarioProduto;
    }

// setters setar o valor -modificar-
    public function setIdProduto($IdProduto) {
        return $this->IdProduto = $IdProduto;
    }

    public function setNomeProduto($NomeProduto) {
        $this->NomeProduto = $NomeProduto;
    }

    public function setPrecoProduto($PrecoProduto) {
        $this->PrecoProduto = $PrecoProduto;
    }

    public function setComentarioProduto($ComentarioProduto) {
        $this->ComentarioProduto = $ComentarioProduto;
    }

}

class DadosProduto {

    public function insert($produto) {
        $connectPDO;
        try {
            $connectPDO = new PDO('mysql:host=localhost;dbname=ngrefeicoes', 'root', '');
            $connectPDO->beginTransaction();
            $sqlInsert = "INSERT INTO  produtos (NomeProduto, PrecoProduto, ComentarioProduto) VALUES (:NomeProduto, :PrecoProduto, :ComentarioProduto)";
            $preparedStm = $connectPDO->prepare($sqlInsert);
            $preparedStm->bindValue(":NomeProduto", $produto->getNomeProduto());
            $preparedStm->bindValue(":PrecoProduto", $produto->getPrecoProduto());
            $preparedStm->bindValue(":ComentarioProduto", $produto->getComentarioProduto());
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

    public function listar($produto) {
        $connectPDO;
        try {
            $connectPDO = new PDO('mysql:host=localhost;dbname=ngrefeicoes', 'root', '');
            $connectPDO->exec('set names utf8'); // lee caracteres especiales
            $connectPDO->beginTransaction();
            $selectSql = "SELECT IdProduto, NomeProduto, PrecoProduto, ComentarioProduto FROM produtos";
            $preparedStm = $connectPDO->prepare($selectSql);

            if ($preparedStm->execute() == true) {
                $connectPDO->commit();
                return $preparedStm->fetchAll();
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

    public function traeUno($produto) {
        $connectPDO;
        try {
            $connectPDO = new PDO('mysql:host=localhost;dbname=ngrefeicoes', 'root', '');
            $connectPDO->beginTransaction();
            $sqlSelect = "SELECT * FROM produtos WHERE IdProduto = :IdProduto";
            $preparedStm = $connectPDO->prepare($sqlSelect);
            $preparedStm->bindValue(":IdProduto", $produto->getIdProduto());
            $preparedStm->execute();
            $linea = $preparedStm->fetch(PDO::FETCH_ASSOC); //trae una linea de datos
            if ($linea) {
                $connectPDO->commit();
                return $linea;
            } else {
                $connectPDO->commit();
                throw new PDOException("Error Processing Request" . $preparedStm->errorCode() . "-" . implode($preparedStm->errorInfo()));
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        } finally {
            if (isset($connectPDO)) {
                unset($connectPDO);
            }
        }
    }

    public function editar($produto) {
        $connectPDO;
        try {
            $connectPDO = new PDO('mysql:host=localhost;dbname=ngrefeicoes', 'root', '');
            $connectPDO->beginTransaction();
            $updateSql = "UPDATE produtos SET NomeProduto = :NomeProduto, PrecoProduto = :PrecoProduto, ComentarioProduto = :ComentarioProduto WHERE IdProduto = :IdProduto";
            $preparedStm = $connectPDO->prepare($updateSql);
            $preparedStm->bindValue(":IdProduto", $produto->getIdProduto());
            $preparedStm->bindValue(":NomeProduto", $produto->getNomeProduto());
            $preparedStm->bindValue(":PrecoProduto", $produto->getPrecoProduto());
            $preparedStm->bindValue(":ComentarioProduto", $produto->getComentarioProduto());
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
            if (isset($connectPDO)) {
                unset($connectPDO);
            }
        }
    }

    public function excluir($produto) {
        $connectPDO;
        try {
            $connectPDO = new PDO('mysql:host=localhost;dbname=ngrefeicoes', 'root', '');
            $connectPDO->beginTransaction();
            $sqlDelete = "DELETE FROM produtos WHERE IdProduto = :IdProduto";
            $preparedStm = $connectPDO->prepare($sqlDelete);
            $preparedStm->bindValue(":IdProduto", $produto->getIdProduto());

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
            if (isset($connectPDO)) {
                unset($connectPDO);
            }
        }
    }

}
