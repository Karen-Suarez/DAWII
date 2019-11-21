<?php
session_start();

include_once '../../classes/classUsuario.php';
$email =  $_POST['Email'];
$senha = hash('joaat', $_POST['Senha']);//trans. a senha com o hash

$objU =  new Usuario();
$objDU = new DadosUsuario();

if ($objDU->login($email, $senha) == true) {
    $_SESSION['login'] = true;
    //echo'entrou';
    header('Location: index.php');
} else {
    //echo'deu merda';
    header('Location: loginCopy.php');
}
//TERMINAR EL CAPTCHA DE GOOGLE!!!!