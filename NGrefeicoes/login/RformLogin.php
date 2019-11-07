<?php
include_once '../classes/classUsuario.php';
$email =  $_POST['Email'];
$senha = $_POST['Senha'];
$objU =  new Usuario();
$objDU = new DadosUsuario();

if ($objDU->login($email, $senha) == true) {
    header('Location: ../index.html');
} else {
     header('Location: loginForm.php');
}