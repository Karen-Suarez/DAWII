<?php
session_start();

include_once '../classes/classUsuario.php';
$email =  $_POST['Email'];
$senha = $_POST['Senha'];
$objU =  new Usuario();
$objDU = new DadosUsuario();

if ($objDU->login($email, $senha) == true) {
    $_SESSION['login'] = true;
    //echo'entrou';
    header('Location: ../dashgumfree_v2/Theme/index.php');
} else {
    //echo'deu merda';
    header('Location: loginForm.php');
}