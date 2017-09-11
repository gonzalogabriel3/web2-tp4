<?php 
    require 'cabecera.php';

?>

<center><h1 style="font-size: 40px;color: blue;">Registrar Usuario</h1></center>
<form method="post" action="UsuarioController.php">
    
    <div class="form-group">
        <label class="control-label" for="usuario">Nombre de Usuario</label>
        <input type="text" class="form-control" name="usr" id="usuario" required/>
  
    </div> 
    <br><br>
    <div class="form-group">
        <label class="control-label" for="password">Password</label>
        <input type="password" class="form-control" name="pass" id="password" required/>
  
    </div> 
    <br><br>
    <center><button type="submit" class="btn btn-primary center">Registrar Usuario</button></center>
</form>



<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php require 'pie.php';?>