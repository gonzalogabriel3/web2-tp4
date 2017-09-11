<?php

require_once 'Cliente.php';
require_once 'ClienteModel.php';

//Logica
$client=new Cliente();
$modelo=new ClienteModel();


if(isset($_REQUEST['action'])){
    
    /*Valido que accion se desea realizar*/
    switch ($_REQUEST['action']) {
        
        case 'actualizar':
            /*Al objeto cliente que creé le seteo los valores provinientes del request*/
            $client->__set('apellido', $_REQUEST['apellido']);
            $client->__set('nombre', $_REQUEST['nombre']);
            $client->__set('edad', $_REQUEST['edad']);
            $client->__set('nacionalidad', $_REQUEST['nacionalidad']);
            $client->__set('activo', $_REQUEST['activo']);
            
            //Paso el objeto cliente al modelo para que lo actualice en la base de datos y redirecciono
            $modelo->Actualizar($client);
            header("Location: index.php");
            
         break;
         
        case 'registrar':  
                
                /*Al objeto cliente que creé le seteo los valores provinientes del request*/
            $client->__set('apellido', $_REQUEST['apellido']);
            $client->__set('nombre', $_REQUEST['nombre']);
            $client->__set('edad', $_REQUEST['edad']);
            $client->__set('nacionalidad', $_REQUEST['nacionalidad']);
            $client->__set('activo', $_REQUEST['activo']);
            
            $modelo->Registrar($client);
            header("Location: index.php");
         break;   
     
        case 'eliminar':
            
            $modelo->Eliminar($_REQUEST['id']);
            header("Location: index.php");
            
            
        case 'editar':
            $client=$modelo->Obtener($_REQUEST['id']);
         
         break;
     
        default:
            break;
    }
}

