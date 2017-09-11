<?php

/*Creo la entidad Cliente ya que es la data a mapear ya sea para listar o realizar una acción contra la 
 base de datos (registrar/eliminar/actualizar).
 Por regla esta clase contiene como atributos las columnas de la tabla.*/
class Cliente{
    
    private $id;
    private $apellido;
    private $nombre;
    private $edad;
    private $nacionalidad;
    private $activo;
    private $fechaNac;
    
    // se utiliza para consultar datos a partir de propiedades inaccesibles.
    public function __get($clave){
        return $this->$clave;
        
    }
    
    //se ejecuta al escribir datos sobre propiedades inaccesibles.
    public function __set($clave,$valor){
        return $this->$clave=$valor;
    }
    
    
 }

