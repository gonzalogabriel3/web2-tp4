<?php
require_once 'ClienteLogica.php'; 
require 'cabecera.php';
 
?>
<span class="glyphicon glyphicon-user"><a style="display: inline-block;text-align: right;text-decoration: none;font-size: 20px;" href="FormularioIngreso.php">IniciarSesion&nbsp;</a></span>
<span class="glyphicon glyphicon-floppy-open"><a style="display: inline-block;text-align: right;text-decoration: none;font-size: 20px;" href="formularioUsuarioVista.php">Registrarse</a></center></span>

<br><br>
<h1 style="font-size: 60px;color: yellow;display: inline">Clientes</h1>

<br><br>   
<!--Tabla-->
    <table class="table table-hover">
        <thead style="background-color: #9B9A94;">
      <tr>
          <th style="font-size: 20px;">Apellido</th>
        <th style="font-size: 20px;">Nombre</th>
        <th style="font-size: 20px;">Edad</th>
        <th style="font-size: 20px;">Nacionalidad</th>
        <th style="font-size: 20px;">Activo</th>
        <th></th>
      </tr>
      
    </thead>
   
 <?php foreach($modelo->Listar() as $r): ?>
 
 <?php   
    if($r->__get('activo')==1){
        $act="imagenes/ok.ico";
    }else{
        $act="imagenes/no.png";
    }
  ?>  
  <tr>  
    <td><b><?php echo $r->__get('apellido');?></b></td>
    <td><b><?php echo $r->__get('nombre');?></b></td>
    <td><b><?php echo $r->__get('edad');?></b></td>
    <td><b><?php echo $r->__get('nacionalidad');?></b></td>
    <td><img style="display:inline;width:55px;" src="<?php echo $act;?>"></td>
    
  </tr> 
 <?php endforeach; ?>

</table>

<?php require "pie.php"?> 




