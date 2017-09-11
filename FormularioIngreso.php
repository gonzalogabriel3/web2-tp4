<?php 
    require 'cabecera.php';
    
    
    
?>    

<center><h2 style="color: green"><b>Inicio de Sesion</b></h2></center>

<form  method="post" action="ProcesarUsuario.php">
    
    <div class="form-grou">
        <label class="control-label" for="usr">Usuario</label>
        <input type="text" class="form-control" name="username" id="usr"/>
        
    </div> 
    <br><br>
    
    <div class="form-group">
        <label  class="control-label" for="pass">Password</label>
        <input type="password" class="form-control" name="password" id="pass"/>
        
    </div>
    
    <center><button type="submit" class="btn btn-success center">Iniciar Sesion</button></center>
</form>
   



<br><br><br><br><br><br><br><br><br>
<?php 
    require 'pie.php';

    ?>