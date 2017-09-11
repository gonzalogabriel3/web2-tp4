<?php
/*Necesitamos crear una clase que contenga la lógica de negocio que nos permita acceder a la base de datos. 
 Esta la conoceremos como nuestro modelo de acceso a datos.*/
Class ClienteModel{
    
    private $pdo;
    
    
    
/*Nuestro constructor de AlumnoModel se encarga de inicializar la cadena de conexión hacia MySQL y esta 
 instancia es guardado en la variable $pdo del tipo private. 
  De esta manera en cada método de mi clase puedo hacer referencia a la instancia de conexión a MySQL*/
    public function __construct() {
        try{
            $this->pdo=new PDO('mysql:host=localhost;dbname=clientes_db', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            $ex->getMessage();
        } 
    }
    
    //Funcion que retorna todos los registra de la tabla
    public function Listar(){
        
        try{
            
         $resutl=array();
         
         //Ejecuto la query que me devuelve todos los registros de la tabla
         $stm= $this->pdo->prepare("SELECT * FROM clientes");
         $stm->execute();
         
         //Voy iterando cada uno de esos registros en un foreach($r es cada uno de esos registros)
         foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r){
             
             /*A medida que obtengo un registro,creo un objeto de tipo cliente y le seteo los valores
              de los campos de la tabla en sus atributos*/ 
             $cli=new Cliente();
             
             $cli->__set('id',$r->id);
             $cli->__set('apellido',$r->apellido);
             $cli->__set('nombre',$r->nombre);
             $cli->__set('edad',$r->edad);
             $cli->__set('nacionalidad',$r->nacionalidad);
             $cli->__set('activo',$r->activo);
             
             /*Guardo el cliente en el arreglo*/
             $resutl[]=$cli;
          }   
            //Retorno un array con objetos de tipo cliente
            return $resutl;
            
        } catch (Exception $ex) {
              die($ex->getMessage());
        }
    }
  
  //Funcion que retorna un objeto cliente a partir de su id  
  public function Obtener($id){
      
      try{
          //preparo la consulta y la ejecuto pasandole el parametro $id
          $stm= $this->pdo->prepare("SELECT * FROM clientes WHERE clientes.id=?");
          $stm->execute(array($id));
          
          //guardo el resultado en $r
          $r = $stm->fetch(PDO::FETCH_OBJ);
          
          //Creo un objeto cliente y a sus atributos le asigno los valores del registro
          $cli=new Cliente();
          
          $cli->__set('id',$r->id);
          $cli->__set('apellido',$r->apellido);
          $cli->__set('nombre',$r->nombre);
          $cli->__set('edad',$r->edad);
          $cli->__set('nacionalidad',$r->nacionalidad);
          $cli->__set('activo',$r->activo);
                  
          return $cli;
          
      } catch (Exception $ex) {
          die($ex->getMessage());
      }    
  }  
    
  //Funcion que elimina un registro a partir de su id 
  public function Eliminar($id){
      
      try{
          
          $stm=$this->pdo->prepare("DELETE FROM clientes WHERE clientes.id = ?");
          $stm->execute(array($id));
          
      } catch (Exception $ex) {
           die($ex->getMessage());
      }
      
      
  }
  
  //Funcion que actualiza un registro de la tabla
  public function Actualizar(Cliente $data){
      
      $edad= $this->calcularEdad($data->__get('fechaNac'));
      
      try{
          $sql="UPDATE clientes SET "
                  ."apellido = ?,"
                  ."nombre = ?,"
                  ."edad = ?,"
                  ."nacionalidad = ?,"
                  ."activo = ?"
                  ."WHERE id = ?";
          
         $this->pdo->prepare($sql) 
                 ->execute(
                    array(
                       $data->__get('apellido'),
                       $data->__get('nombre'),
                       $edad,
                       $data->__get('nacionalidad'),
                       $data->__get('activo'),
                       $data->__get('id')
                    )     
                 );
         
      } catch (Exception $ex) {
            die("<br>Error al actualizar los datos <br>".$ex->getMessage());
      }
      
  }
  
  //Funcion que inserta un registro,recibe como parametro un objeto de tipo Cliente
  public function Registrar(Cliente $data){
      
      $edad= $this->calcularEdad($data->__get('fechaNac'));
      
      try{
          $sql="INSERT INTO clientes (apellido,nombre,edad,nacionalidad,activo)"
                  . "VALUES (?,?,?,?,?)";
          
          $this->pdo->prepare($sql)
                  ->execute(
                     array(
                         $data->__get('apellido'),
                         $data->__get('nombre'),
                         $edad,
                         $data->__get('nacionalidad'),
                         $data->activo
                     )     
                  );
          
      } catch (Exception $ex) {
            die($ex->getMessage());
      }
      
  }
    
  /*Funcion para calcular la edad de una fecha de un input*/
   public function calcularEdad($fecha){
            
            $dia=date("d");
            $mes=date("m");
            $ano=date("Y");


            $dianaz=date("d",strtotime($fecha));
            $mesnaz=date("m",strtotime($fecha));
            $anonaz=date("Y",strtotime($fecha));


            //si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual

            if (($mesnaz == $mes) && ($dianaz > $dia)) {
               $ano=($ano-1); }

                //si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual

            if ($mesnaz > $mes) {
                $ano=($ano-1);}

                 //ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad

            $edad=($ano-$anonaz);
            return $edad;
   }
      
}

