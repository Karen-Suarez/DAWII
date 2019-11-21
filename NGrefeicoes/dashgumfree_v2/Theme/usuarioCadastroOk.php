<?php 
include_once '../../classes/classUsuario.php';
$nome = $_POST['Nome'];
$email = $_POST['Email'];
$senha = hash('joaat', $_POST['Senha']);//trans. a senha com o hash

$objuser= new Usuario();
$objuser->setnome($nome);
$objuser->setemail($email);
$objuser->setsenha($senha);
$objDU= new DadosUsuario();
$ok = $objDU->insert($objuser);
if ($ok) {
    //echo 'DADOS INSERIDOS!!';
    header("Location:loginCopy.php");  
}else{
    //echo 'deu merda!';
    header("Location:cadastroUser.php");  
}
/** TERMINAR SENHAS COM HASH"""""""""""""""""""!!!!!!!!!!!!!!!!!!!! */