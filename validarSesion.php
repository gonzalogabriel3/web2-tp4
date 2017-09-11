<?php
session_start();

if(!isset($_SESSION['logueado'])){
    
        
        header("Location: FormularioIngreso.php");
    
}

