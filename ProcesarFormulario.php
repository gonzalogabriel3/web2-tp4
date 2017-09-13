<?php

    require_once 'formularioPersona.php';
    require_once 'ClienteLogica.php';
    
    $miFormulario=new formularioPersona();
    
    if(!empty($_POST)){
        if($miFormulario->procesarFormulario($_POST)){
            $client->apellido=$_POST['apellido'];
            $client->nombre=$_POST['nombre'];
            $fecha=$_POST['fecha'];
            $client->nacionalidad=$_POST['nacionalidad'];
            
            $fechaCliente=date("d-m-Y", strtotime($fecha));
            
            $client->fechaNac=$fechaCliente;
            
            $activo=1;
            if($_POST['activo']==""){
                $activo=0;
            }
            $client->activo=$activo;
            
            $modelo->Registrar($client);
            header("Location: index.php");
            die();
        }
    }
    
    require 'formularioVista.php';