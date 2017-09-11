<?php

class UsuarioModel{
    
    private $pdo;
    
    
    public function __construct() {
        try{
            $this->pdo=new PDO('mysql:host=localhost;dbname=clientes_db', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            $ex->getMessage();
        } 
    }
    
    
    public function Registrar(Usuario $data){
        
        try{
            
            $sql="INSERT INTO usuario (username,password) VALUES (?,?)";
            
            $this->pdo->prepare($sql)
                    ->execute(
                         array(
                             $data->__get('username'),
                             $data->__get('password')
                         )     
                     );
            
            
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        
    }
    
    public function Obtener($id){
        try{
            $stm= $this->pdo->prepare("SELECT * FROM usuario WHERE usuario.id=?");
            $stm->execute(array($id));
            
            //guardo el resultado en $r
            $r = $stm->fetch(PDO::FETCH_OBJ);
            
            $usr=new Usuario();
            
            $usr->__set('id',$r->id);
            $usr->__set('username',$r->username);
            $usr->__set('password',$r->password);
            
            return $usr;
            
        } catch (Exception $ex) {
              $ex->getMessage();
        }
    }
    
    public function Consultar(Usuario $data){
        try{
        $stm= $this->pdo->prepare("SELECT * FROM usuario WHERE usuario.username= ? AND usuario.password=?");
        $stm->execute(array(
            $data->__get('username'),
            $data->__get('password')
        ));
        
        $r=$stm->fetch(PDO::FETCH_OBJ);
        
        $usr=new Usuario();
        $usr->__set('username',$r->username);
        $usr->__set('password',$r->password);
        
        return $usr;
        
        
        } catch (Exception $ex){
            die($ex->getMessage());
        }      
        
    }
    
}
