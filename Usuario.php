<?php

class Usuario{
    
    private $id;
    private $username;
    private $password;
    
    
    public function __get($clave){
        return $this->$clave;
    }
    
    public function __set($clave,$valor){
        return $this->$clave=$valor;
    }
    
    
    
}
