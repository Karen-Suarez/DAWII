<?php 
include_once '../../classes/classUsuario.php';
$nome = $_POST['Nome'];
$email = $_POST['Email'];
$senha = $_POST['Senha'];

$objuser= new Usuario();
$objuser->setnome($nome);
$objuser->setemail($email);
$objuser->setsenha($senha);
$objDU= new DadosUsuario();
$ok = $objDU->insert($objuser);
if ($ok) {
    echo 'DADOS INSERIDOS!!';
}else{
    echo 'deu merda!';
}