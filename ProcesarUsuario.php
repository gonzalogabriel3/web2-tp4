<?php
session_start();

require 'Usuario.php';
require 'UsuarioModel.php';
$usuario=new Usuario();
$modelo=new UsuarioModel();

if(!empty($_POST)){
    
    $usuario->username=$_POST['username'];
    $usuario->password=$_POST['password'];
    
    $usuarioConsultado=$modelo->Consultar($usuario);
    
    if($usuario->username=$usuarioConsultado->username && $usuario->password=$usuarioConsultado->password){
        
        $_SESSION['logueado']=1;
        
        echo 'Has iniciado sesion';
        header("Location: index.php");
        die();
    }
    
}


header("Location: errorUsuarioVista.php");

