<?php

    require_once 'FormStub.php';

    Class formularioPersona extends FormStub{
       
     /*Arreglo que va a contener todas las nacionalidades disponibles en el formulario,
      y que se le va a pasar al <select> como opciones*/
     public $nacionalidades;
        
     public function __construct() {
            $this->nacionalidades=[ 1 => "Argentino",2 => "Chileno",3 => "Peruano",4 => "Uruguayo",5 =>"Paraguayo",
                6 => "Venezolano",7 => "Ecuatoriano",8 => "Otro"];
     }

    /*Funcion que copia todos los valores ingresados en el formulario en el atributo
       'valores' del objeto Formulario,es decir que copia todos esos valores en un arreglo,
       donde 'campoDelFormulario' es el indice y valorDelCampo es el contenido*/
    protected function rellenarCon($arreglo_datos) {
         foreach($arreglo_datos as $campoDelFormulario => $valorDelCampo) {
             $this->valores[$campoDelFormulario] = $valorDelCampo;
            }
    }

    /*Funcion que indica si un checkbox fue seleccionado o no*/
    public function getChecked($campo) {
	return $this->getValor($campo) ? "checked" : "";
    }

    /*Funcion que retorna el mensaje de error del campo solicitado*/
    public function getError($campo) {
        return $this->tieneError($campo) ? $this->errores[$campo] : "";
    }

    /*Funcion que indica si un option de un select fue seleccionado o no*/
    public function getSelected($campo, $valor_ref) {
        return $this->getValor($campo) == $valor_ref ? "selected" : "";
    }

    /*Funcion que retorna el contenido(valor)del campo del formulario que se le pasa*/
    public function getValor($campo) {
         return $this->tieneValor($campo) ? $this->valores[$campo] : "";
    }

    /*Funcion para setear un mensaje de error al arreglo de 'errores' cuyo indice es la 
        variable $campo */
    public function setError($campo, $mensaje) {
        $this->errores[$campo] = $mensaje;
    }

    /*Funcion que retorna v/f si el campo pasado tiene un error*/
     public function tieneError($campo) {
          return !empty($this->errores[$campo]);
      }

    /*Funcion que verifica si hubo errores(se fija si el arreglo de 'errores' esta vacio o no)y
         en base a eso retorna verdadero/falso */
    public function tieneErrores() {
           return !empty($this->errores);
    }

    /*Funcion que retorna verdadero/falso si el nombre del campo que se le pasa contiene algun valor*/
    public function tieneValor($campo) {
        
        return !empty($this->valores[$campo]);
    }
    
    /*Validaciones*/
    public function validarNacionalidad($campo){
        $nacionalidad=$this->getValor('nacionalidad');
        
        if($nacionalidad!='Argentino' && $nacionalidad!='Chileno' && $nacionalidad!='Otro'
                && $nacionalidad!='Paraguayo' && $nacionalidad!='Uruguayo' && $nacionalidad!='Ecuatoriano'
                && $nacionalidad!='Venezolano' && $nacionalidad!='Peruano'){
            $this->setError('nacionalidad', 'Debe seleccionar una nacionalidad valida');
            return;
        }
        
    }
   
    public function validarFecha($campo){
        $fecha=$this->getValor('fecha');
        
        //$fechaActual=date("d-m-Y");
        
        if(empty($fecha)){
            $this->setError('fecha', 'Debe ingresar fecha');
        }
        
    }


    
    public function validarApellido($campo){
        
        $apellido= $this->getValor($campo);
        
        /*Si el apellido esta vacio,seteo un mensaje de error al arreglo de errores cuya clave/key
         lo llamo $campo*/
        if(empty($apellido)){
            $this->setError($campo, "Falto ingresar el Apellido");
            return;
        }
        
        if (strlen($apellido)<=2){
            $this->setError($campo, "El apellido debe contener al menos 3 letras");
            return;
        }
        
        if(is_numeric($apellido)){
            $this->setError($campo, "No debe ingresar numeros en este campo");
            return;
        }
        
    }

    public function validarNombre($campo){
        
        $nombre= $this->getValor($campo);
        
        /*Si el apellido esta vacio,seteo un mensaje de error al arreglo de errores cuya clave/key
         lo llamo $campo*/
        if(empty($nombre)){
            $this->setError($campo, "Falto ingresar el nombre");
            return;
        }
       
        if (strlen($nombre)<=2){
            $this->setError($campo, "El nombre debe contener al menos 3 letras");
            return;
        }
        
        if(is_numeric($nombre)){
            $this->setError($campo, "No debe ingresar numeros en este campo");
            return;
        }
    }
    
    
    public function validar(){
        
        $this->validarApellido('apellido');
        $this->validarNombre('nombre');
        $this->validarNacionalidad('nacionalidad');
        $this->validarFecha('fecha');
        
    }
    
    public function  procesarFormulario($arreglo_datos){
        $this->rellenarCon($arreglo_datos);
        $this->validar();
        
        /*Si se valido todo ok,se retorna verdadero*/
        if(empty($this->errores)){
            return true;
        }    
        
        return;
    }    
    
}
  

