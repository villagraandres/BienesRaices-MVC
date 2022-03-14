<?php
namespace Model;

class ActiveRecord {
 //Base de datos
 protected static $db;
 protected static $columnasDB=[];
 protected static $tabla='';

 //Validacion
 protected static $errores=[];



 
//Definir conexion a la db
 public static function setDb($database){
     self::$db=$database;
 }

 

 public function guardar(){
     if (!is_null($this->id)) {
         $this->actualizar();
     }else{
         $this->crear();
     }
 }

 public function crear(){
 $atributos = $this->sanitizarDatos();

 // Insertar en la base de datos
 $query = " INSERT INTO " . static::$tabla . " ( ";
 $query .= join(', ', array_keys($atributos));
 $query .= " ) VALUES (' "; 
 $query .= join("', '", array_values($atributos));
 $query .= " ') ";

 // Resultado de la consulta

 $resultado = self::$db->query($query);

 // Mensaje de exito
 if($resultado) {
     // Redireccionar al usuario.
     header('Location: /admin?resultado=1');
 }
 }
 

 public function actualizar(){
     $atributos=$this->sanitizarDatos();

     $valores=[];
     foreach($atributos as $key=>$value){
         $valores[]="{$key}='{$value}'";
     }
     $query="UPDATE ".static::$tabla. " SET ";
     $query.=join(', ',$valores);
     $query.=" WHERE id= '". self::$db->escape_string($this->id)."'  ";
     $query.=" LIMIT 1 ";
     
    $resultado=self::$db->query($query);


    if($resultado) {
     // Redireccionar al usuario.
     header('Location: /admin?resultado=2');
 }
 }

 
 public function eliminar(){
    //elimina propiedad
   $query="DELETE FROM ". static::$tabla." WHERE id=". self::$db->escape_string($this->id) ." LIMIT 1";
   $resultado=self::$db->query($query);

   if ($resultado) {
       $this->borrarImagen();
       if ($resultado) {
           header('location:/admin?resultado=3 ');
         }
   }

}



 public function atributos(){
     $atributos=[];
     foreach(static::$columnasDB as $columna){
         if ($columna==='id') continue;
             
         
     $atributos[$columna]=$this->$columna;
     
     
    
 }
 return $atributos;

 }


 public function sanitizarDatos(){
    $atributos=$this->atributos();
    $sanitizado=[];
   
    foreach($atributos as $key=>$value){
        $sanitizado[$key]=self::$db->escape_string($value);
    }
   return $atributos;

 }
 //Subida de archivos
 public function setImagen($imagen,$ruta){
    
     //Elimina la imagen previa
     if ($this->id) {
        $existeArchivo=file_exists($ruta.$this->imagen);
        if ($existeArchivo) {
            unlink($ruta.$this->imagen);
        }
     }
   

     if ($imagen) {
        $this->imagen=$imagen;
     }
 }

 //Elimina el archivo

 public function borrarImagen(){
     //Comprobar si existe
     $existeArchivo=file_exists(CARPETA_IMAGENES.$this->imagen);
     if ($existeArchivo) {
         unlink(CARPETA_IMAGENES.$this->imagen);
     }
 }


 //Validacion
 public static function getErroes(){
     return static::$errores;
 }

 public function validar(){
     
     static::$errores=[];
     return static::$errores;
 }

 //Lista todas las propiedades
 public static function all(){
     $query="SELECT * FROM " . static::$tabla;

     $resultado=self::consultarSQL($query);
     return $resultado;
 }
 //Obtiene determinado numero de registros
 public static function get($cantidad){
    $query="SELECT * FROM " . static::$tabla. " LIMIT ". $cantidad;

    $resultado=self::consultarSQL($query);
    return $resultado;
}

 //Busca una propiedad por su id 

 public static function find($id){
     //Obtener datos de la propiedad
 $query="SELECT * FROM ".static::$tabla." WHERE id=${'id'}";
 $resultado=self::consultarSQL($query);
 return array_shift($resultado) ;

 }


 
 public static function consultarSQL($query){
     //Consultar la db
     $resultado=self::$db->query($query);

     //Iterar sobre las propiedads
     $array=[];
     while($registro=$resultado->fetch_assoc()){
         $array[]=static::crearObjeto($registro);
     }
     

   

     //Liberar la memoria
     $resultado->free();

     //Retornar los resultados
     return $array;
 }

 protected static function crearObjeto($registro) {
     $objeto = new static; //un nuevo objeto de la clase heredada

     foreach($registro as $key => $value ) {
         if(property_exists( $objeto, $key  )) {
           $objeto->$key=$value;
         }
     }

     
  
     return $objeto;
 }

 //Sincroniza objeto en memoria con cambios

 public function sincronizar($args=[]) { 
    foreach($args as $key => $value) {
      if(property_exists($this, $key) && !is_null($value)) {
        $this->$key = $value;
      }
    }
}

 }
 


