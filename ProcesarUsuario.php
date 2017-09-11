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

echo '<h3 style="color:red">ERROR AL INICIAR  SESION</h3>';

