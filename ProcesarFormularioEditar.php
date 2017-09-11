<?php

    require_once 'formularioPersona.php';
    require_once 'ClienteLogica.php';
    
    $miFormulario=new formularioPersona();
    
    if(!empty($_POST)){
        if($miFormulario->procesarFormulario($_POST)){
            
            echo $client->id=$_POST['id'];
            echo $client->apellido=$_POST['apellido'];
            echo $client->nombre=$_POST['nombre'];
            echo $client->fechaNac=$_POST['fecha'];
            echo $client->nacionalidad=$_POST['nacionalidad'];
            
            /*valido si esta activo*/
            if(!isset($_POST['activo'])){
                $activo=0;
            }elseif(isset($_POST['activo'])){
                $activo=1;
            }
            $client->activo=$activo;
            echo $client->activo;
            
            
            $modelo->Actualizar($client);
            header("Location: index.php");
            
             die();
             
            
        }
    }
    
    require 'modificarVista.php';