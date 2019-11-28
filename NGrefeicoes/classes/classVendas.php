<?php

class Vendas {

    private $IdVenda;
    private $DataVenda;
    private $QuantidadeVenda;
    private $PrecoVenda;
    private $IdProdutoFk;

    public function __construct(/* $IdVenda,$DataVenda,$QuantidadeVenda,$PrecoVenda,$IdProdutoFk */) {
        /* $this->IdVenda = $IdVenda;
          $this->DataVenda = $DataVenda;
          $this->QuantidadeVenda = $QuantidadeVenda;
          $this->PrecoVenda = $PrecoVenda;
          $this->IdProdutoFk = $IdProdutoFk; */
    }

//getters
    public function getIdVenda() {
        return $this->IdVenda;
    }

    public function getDataVenda() {
        return $this->DataVenda;
    }

    public function getQuantidadeVenda() {
        return $this->QuantidadeVenda;
    }

    public function getPrecoVenda() {
        return $this->PrecoVenda;
    }

    public function getIdProdutoFk() {
        return $this->IdProdutoFk;
    }

//seters
    public function setIdVenda($IdVenda) {
        $this->IdVenda = $IdVenda;
    }

    public function setDataVenda($DataVenda) {
        $this->DataVenda = $DataVenda;
    }

    public function setQuantidadeVenda($QuantidadeVenda) {
        $this->QuantidadeVenda = $QuantidadeVenda;
    }

    public function setPrecoVenda($PrecoVenda) {
        $this->PrecoVenda = $PrecoVenda;
    }

    public function setIdProdutoFk($IdProdutoFk) {
        $this->IdProdutoFk = $IdProdutoFk;
    }

}

class DadosVenda {

    public function insert($venda) {
        $connectPDO;
        try {
            $connectPDO = new PDO('mysql:host=localhost;dbname=ngrefeicoes', 'root', '');
            $connectPDO->beginTransaction();
            $sqlInsert = "INSERT INTO vendas(DataVenda, QuantidadeVenda, PrecoVenda, IdProdutoFk) VALUES (:DataVenda, :QuantidadeVenda, :PrecoVenda, :IdProdutoFk)";
            $preparedStm = $connectPDO->prepare($sqlInsert);
            $preparedStm->bindValue(":DataVenda", $venda->getDataVenda());
            $preparedStm->bindValue(":QuantidadeVenda", $venda->getQuantidadeVenda());
            $preparedStm->bindValue(":PrecoVenda", $venda->getPrecoVenda());
            $preparedStm->bindValue(":IdProdutoFk", $venda->getIdProdutoFk());
            $executar = $preparedStm->execute();

            if ($executar == TRUE) {
                $connectPDO->commit();
                return TRUE;
            } else {
                throw new PDOException("Error Processing Request" . $preparedStm->errorCode() . "-" . implode($preparedStm->errorInfo()));
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            if (isset($connectPDO)) {
                unset($connectPDO);
            }
        }
    }

    public function listar($venda) {
        $connectPDO;
        try {
            $connectPDO = new PDO('mysql:host=localhost;dbname=ngrefeicoes', 'root', '');
            $connectPDO->exec('set names utf8'); // lee caracteres especiales
            $connectPDO->beginTransaction();
            $sqlSelect = "SELECT vendas.*, produtos.NomeProduto FROM vendas INNER JOIN produtos ON vendas.IdProdutoFk = produtos.IdProduto";
            $preparedStm = $connectPDO->prepare($sqlSelect);
            //$preparedStm->execute();

            if ($preparedStm->execute() == true) {
                $connectPDO->commit();
                return $preparedStm->fetchAll();
            } else {
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

    public function traeUno($venda) {
        $connectPDO;
        try {
            $connectPDO = new PDO('mysql:host=localhost;dbname=ngrefeicoes', 'root', '');
            $connectPDO->exec('set names utf8'); // lee caracteres especiales
            $connectPDO->beginTransaction();
            $sqlSelect = "SELECT IdVenda, DataVenda, QuantidadeVenda, PrecoVenda, IdProdutoFk, NomeProduto FROM vendas JOIN produtos ON IdProduto = IdProdutoFk WHERE IdVenda = :IdVenda";
            $preparedStm = $connectPDO->prepare($sqlSelect);
            $preparedStm->bindValue(":IdVenda", $venda->getIdVenda());
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

    public function editar($venda) {
        $connectPDO;
        try {
            $connectPDO = new PDO('mysql:host=localhost;dbname=ngrefeicoes', 'root', '');
            $connectPDO->exec('set names utf8'); // lee caracteres especiales
            $connectPDO->beginTransaction();
            $sqlUpdate = "UPDATE vendas SET DataVenda = :DataVenda, QuantidadeVenda = :QuantidadeVenda, PrecoVenda = :PrecoVenda, IdProdutoFk = :IdProdutoFk WHERE IdVenda = :IdVenda";
            $preparedstm = $connectPDO->prepare($sqlUpdate);
            $preparedstm->bindValue("DataVenda", $venda->getDataVenda());
            $preparedstm->bindValue("QuantidadeVenda", $venda->getQuantidadeVenda());
            $preparedstm->bindValue("PrecoVenda", $venda->getPrecoVenda());
            $preparedstm->bindValue("IdProdutoFk", $venda->getIdProdutoFk());
            $preparedstm->bindValue("IdVenda", $venda->getIdVenda());

            if ($preparedstm->execute() == TRUE) {
                $connectPDO->commit();
                return TRUE;
            } else {
                $connectPDO->commit();
                throw new PDOException("Error Processing Request" . $preparedstm->errorCode() . "-" . implode($preparedstm->errorInfo()));
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        } finally {
            if (isset($connectPDO)) {
                unset($connectPDO);
            }
        }
    }

    public function excluir($venda) {
        $connectPDO;
        try {
            $connectPDO = new PDO('mysql:host=localhost;dbname=ngrefeicoes', 'root', '');
            $connectPDO->exec('set names utf8');
            $connectPDO->beginTransaction();
            $sqlDelete = "DELETE FROM vendas WHERE IdVenda= :IdVenda";
            $preparedStm = $connectPDO->prepare($sqlDelete);
            $preparedStm->bindValue(":IdVenda", $venda->getIdVenda());
            //$preparedStm->execute();

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

    public function buscaVendasXdata($venda, $dataI, $dataF) {
        $connectPDO;
        try {
            $connectPDO = new PDO('mysql:host=localhost;dbname=ngrefeicoes', 'root', '');
            $connectPDO->exec('set names utf8'); // lee caracteres especiales
            $connectPDO->beginTransaction();
            //$sqlSelect = "SELECT * FROM vendas WHERE DataVenda BETWEEN '$dataI' AND '$dataF'";
            $sqlSelect = "SELECT vendas.IdVenda,vendas.DataVenda, vendas.QuantidadeVenda, vendas.PrecoVenda, vendas.IdProdutoFk,  produtos.NomeProduto, SUM((vendas.QuantidadeVenda * vendas.PrecoVenda)) AS TOTAL FROM vendas INNER JOIN produtos ON vendas.IdProdutoFk = produtos.IdProduto WHERE vendas.DataVenda BETWEEN '$dataI' AND '$dataF' GROUP BY vendas.IdVenda";
            /* SELECT vendas.IdVenda,vendas.DataVenda, vendas.QuantidadeVenda, vendas.PrecoVenda, vendas.IdProdutoFk,  produtos.NomeProduto, SUM((vendas.QuantidadeVenda * vendas.PrecoVenda)) AS TOTAL FROM vendas INNER JOIN produtos ON vendas.IdProdutoFk = produtos.IdProduto WHERE vendas.DataVenda BETWEEN '$dataI' AND '$dataF' GROUP BY vendas.IdVenda; */
            $preparedStm = $connectPDO->prepare($sqlSelect);
            $preparedStm->bindValue(":IdVenda", $venda->getIdVenda());
            //$preparedStm->execute();

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

    public function buscarVendaXproduto($venda, $nomeProduto) {
        $connectPDO;
        try {
            $connectPDO = new PDO('mysql:host=localhost;dbname=ngrefeicoes', 'root', '');
            $connectPDO->exec('set names utf8'); // lee caracteres especiales
            $connectPDO->beginTransaction();
            $sqlSelect = "SELECT vendas.IdVenda,vendas.DataVenda, vendas.QuantidadeVenda, vendas.PrecoVenda, vendas.IdProdutoFk,  produtos.NomeProduto, SUM((vendas.QuantidadeVenda * vendas.PrecoVenda)) AS TOTAL FROM vendas INNER JOIN produtos ON vendas.IdProdutoFk = produtos.IdProduto WHERE produtos.NomeProduto LIKE '%" . $nomeProduto . "%'  GROUP BY vendas.IdVenda";
            $preparedStm = $connectPDO->prepare($sqlSelect);
            $preparedStm->bindValue(":IdVenda", $venda->getIdVenda());
            //$preparedStm->execute();

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
    
    public function buscarVendaXdataEproduto($venda, $nomeProduto) {
        $connectPDO;
        try {
            $connectPDO = new PDO('mysql:host=localhost;dbname=ngrefeicoes', 'root', '');
            $connectPDO->exec('set names utf8'); // lee caracteres especiales
            $connectPDO->beginTransaction();
            //$sqlSelect = "SELECT * FROM vendas WHERE DataVenda BETWEEN '$dataI' AND '$dataF'";
            $sqlSelect = "SELECT vendas.IdVenda,vendas.DataVenda, vendas.QuantidadeVenda, vendas.PrecoVenda, vendas.IdProdutoFk,  produtos.NomeProduto, SUM((vendas.QuantidadeVenda * vendas.PrecoVenda)) AS TOTAL FROM vendas INNER JOIN produtos ON vendas.IdProdutoFk = produtos.IdProduto WHERE vendas.DataVenda LIKE '%" . $nomeProduto . "%' GROUP BY vendas.IdVenda";
            /* SELECT vendas.IdVenda,vendas.DataVenda, vendas.QuantidadeVenda, vendas.PrecoVenda, vendas.IdProdutoFk,  produtos.NomeProduto, SUM((vendas.QuantidadeVenda * vendas.PrecoVenda)) AS TOTAL FROM vendas INNER JOIN produtos ON vendas.IdProdutoFk = produtos.IdProduto WHERE vendas.DataVenda BETWEEN '$dataI' AND '$dataF' GROUP BY vendas.IdVenda; */
            $preparedStm = $connectPDO->prepare($sqlSelect);
            $preparedStm->bindValue(":IdVenda", $venda->getIdVenda());
            //$preparedStm->execute();

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
    
    public function totalVenda($venda) {
        # code...
    }

}
