<?php
require_once 'ClienteLogica.php'; 
require 'cabecera.php';
require 'validarSesion.php'; 
?>
<span class="glyphicon glyphicon-chevron-left"><a href="salir.php" style="font-size: 15px;color: red;">CerrarSesion</a></span>
 <br>
<h1 style="font-size: 60px;color: blue;display: inline-block">Clientes</h1>
<center><a class="btn btn-primary" style="display: inline-block;text-align: right;" href="ProcesarFormulario.php">Nuevo Cliente</a></center>

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
    <td>
        <a href="ProcesarFormularioEditar.php?id=<?php echo $r->id; ?>"><button class="btn btn-info" >Modificar</button></a>
    </td>
    <td>
        <a onclick="javascript:return confirm('¿Seguro que quiere eliminar a <?php echo $r->nombre." ".$r->apellido ?>?');" href="?action=eliminar&id=<?php echo $r->id ?>"><button class="btn btn-danger">Borrar</button></a>
    </td>
  </tr> 
 <?php endforeach; ?>

</table>

<?php require "pie.php"?> 
 
 
 
 
 
 
 
 
 
 
 
 
 
 