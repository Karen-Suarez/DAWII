<?php

class Usuario {

    private $id_usuario;
    private $nome;
    private $email;
    private $senha;

    function __construct(/*$id_usuario, $nome, $email, $senha*/) {
        /*$this->id_usuario = $id_usuario;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;*/
    }

    public function getid_usuario() {
        return $this->id_usuario;
    }

    public function getnome() {
        return $this->nome;
    }

    public function getemail() {
        return $this->email;
    }

    public function getsenha() {
        return $this->senha;
    }

    public function setid_usuario($usuario) {
        $this->id_usuario = $usuario;
    }

    public function setnome($nome) {
        $this->nome = $nome;
    }

    public function setemail($email) {
        $this->email = $email;
    }

    public function setsenha($senha) {
        $this->senha = $senha;
    }

}

class DadosUsuario {

    public function insert($usuario) {
        try {
            $connectionPDO = new PDO('mysql:host=localhost;dbname=ngrefeicoes', 'root', '');
            $connectionPDO->beginTransaction();
            $sqlInsert = "INSERT INTO usuario(nome, email, senha) VALUES(:nome, :email, :senha)";
            $preparedStm = $connectionPDO->prepare($sqlInsert);
            $preparedStm->bindValue(':nome', $usuario->getnome());
            $preparedStm->bindValue(':email', $usuario->getemail());
            $preparedStm->bindValue(':senha', $usuario->getsenha());

            if ($preparedStm->execute() == true) {
                $connectionPDO->commit();
                return true;
            } else {
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
    public function login($email, $senha) {
        try {
            $connectionPDO = new PDO('mysql:host=localhost;dbname=ngrefeicoes', 'root', '');
            $connectionPDO->beginTransaction();
            $sqlInsert = "SELECT * FROM usuario WHERE email = :email AND senha = :senha";
            $preparedStm = $connectionPDO->prepare($sqlInsert);
            $preparedStm->bindValue(':email', $email);
            $preparedStm->bindValue(':senha', $senha);
            $ok=$preparedStm->execute();
            
            if ($preparedStm->fetchAll() != array()) {//$preparedSt
                $connectionPDO->commit();
                return TRUE;
            } else {
                //throw new PDOException("Error Processing Request" . $preparedStm->errorCode() . "-" . implode($preparedStm->errorInfo()));
                return FALSE;
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
