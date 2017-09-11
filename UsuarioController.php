<?php
require 'Usuario.php';
require 'UsuarioModel.php';

session_start();

if(!empty($_POST)){
$user=new Usuario();
$modelo=new UsuarioModel();

$user->username=$_POST['usr'];
$user->password=$_POST['pass'];

$modelo->Registrar($user);
$_SESSION['logueado']=1;
header("Location: index.php");

}
echo 'Error al registrar usuario';
