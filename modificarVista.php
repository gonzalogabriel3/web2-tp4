<?php

require_once 'ClienteLogica.php';
require 'cabecera.php';
require 'validarSesion.php';

/*Valido y guardo el id del cliente que se me pasa por parametro en la url*/
$idCliente='';

if(isset($_GET['id'])){
    $idCliente=$_GET['id'];
}

$cliente=new Cliente();
//Al objeto de tipo cliente le asigno el cliente con el id que obtuve
$cliente=$modelo->Obtener($idCliente);

?>

<center><h2 style="color: green"><b>Editar Cliente</b></h2></center>

<form  method="post" action="ProcesarFormularioEditar.php">
    
    <?php 
        /*Si mi formulario contiene errores los notificos
        */
        if($miFormulario->tieneErrores()==true){
       
        
           echo "<div class='alert alert-danger'>
            <p>Se encontraron errores al procesar el formulario.</p>
	</div>";
            
        }
    ?>
    
    
    <!--Valido si cada uno de los campos tiene error al momento de enviar los datos
    si hubo algun error se va a mostrar,si no tiene se mostrara una cadena vacia "" lo que no influye 
    en la vista del formulario
    -->
    <input type="number" name="id" value="<?php echo $cliente->id?>" hidden >
    
    <!--Apellido -->
    <?php $tiene_error=$miFormulario->tieneError('apellido')? "has-error" : "";?>
    <div class="form-group <?php echo $tiene_error;?>">
        <label class="control-label" for="ape">Apellido</label>
        <input type="text" class="form-control" name="apellido" id="ape" value="<?php echo $cliente->apellido?>"/>
        <span class="help-block"><?php echo $miFormulario->getError('apellido');?></span>
    </div> 
    
    <!--Nombre -->
    <?php $tiene_error=$miFormulario->tieneError('nombre')? "has-error" : "";?>
    <div class="form-group <?php echo $tiene_error;?>">
        <label  class="control-label" for="nom">Nombre</label>
        <input type="text" class="form-control" name="nombre" id="nom" value="<?php echo $cliente->nombre?>"/>
        <span class="help-block"><?php echo $miFormulario->getError('nombre');?></span>
    </div> 
  
    <!--Fecha -->
    <?php $tiene_error=$miFormulario->tieneError('fecha')? "has-error" : "";?>
    <div class="form-group">
        <label class="control-label" for="fec">Fecha</label>
        <input type="date" class="form-control" name="fecha" id="fec" value="<?php echo $cliente->fechaNac; ?>"/>
        <span class="help-block" style="color:red"><?php echo $miFormulario->getError('fecha');?></span>
    </div> 
  
    <!--Nacionalidad -->
    <?php $tiene_error=$miFormulario->tieneError('nacionalidad'); ?>
    <div class="form-group">
        <label class="control-label" for="nac">Nacionalidad</label>
        <select class="form-control" name="nacionalidad" id="nac">
            
                <?php foreach ($miFormulario->nacionalidades as $key => $item){
                    if($cliente->nacionalidad==$item){
                        echo "<option selected>".$item."</option>";
                    }
                    echo "<option>".$item."</option>";        
                }?> 
            
        </select>
        <span class="help-block" style="color:red"><?php echo $miFormulario->getError('nacionalidad');?></span>
    </div>
    
    <!--Activo/checkbox -->
    <div class="form-group">
        <label class="control-label" for="act">Activo</label>
        <input type="checkbox"  name="activo" id="act" <?php if($cliente->activo==1){echo "checked";}else{echo "";}  ?>/>
    </div>
    
    <!--Enviar/boton -->
    <center><button type="submit" class="btn btn-primary center">Actualizar datos del Cliente</button></center>
    <a href="index.php" style="display: inline;font-size: 20px;"><span class="glyphicon glyphicon-chevron-left"></span>Volver</a>
    
</form>


<?php require 'pie.php' ?> 