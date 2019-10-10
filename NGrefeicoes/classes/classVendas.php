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

    public function editar($venda) {
        
    }

    public function excluir($venda) {
        
    }

}
