<?php

namespace Model;

class vendedor extends ActiveRecord{
    protected static $tabla='vendedores';
    protected static $columnasDB=['id','vendedores','apellidos','telefono','imagen'];
  
    public $id;
    public $vendedores;
    public $apellidos;
    public $telefono;
    public $imagen;

    public function __construct($args=[])
 {
     
     $this->id=$args['id']?? null;
     $this->vendedores=$args['vendedores']?? '';
     $this->apellidos=$args['apellidos']?? '';
     $this->telefono=$args['telefono']?? '';
     $this->imagen=$args['imagen']?? '';
     
    
 }
 public function validar(){
    if (!$this->vendedores) {
        self::$errores[]="Debes añadir un nombre"; 
     }

     if (!$this->apellidos) {
        self::$errores[]="Debes añadir un apellido"; 
     }
     
    if (strlen(!$this->telefono) ) {
        self::$errores[]="Debes añadir un telefono"; 
     }
     if (!preg_match('/[0-9]{10}/',$this->telefono)) {
      self::$errores[]="Formato telefonico no valido"; 
     }
    /*  if (strlen(!$this->imagen) ) {
      self::$errores[]="Debes añadir una imagen"; 
   } */
    
    

   
    return self::$errores;
}

public function eliminarVendedor(){
   //elimina propiedad
  $query="DELETE FROM vendedores WHERE id=". self::$db->escape_string($this->id) ." LIMIT 1";
  $resultado=self::$db->query($query);

  if ($resultado) {
     
      $this->borrarImagenVendedor();
      if ($resultado) {
          header('location:/admin?resultado=3 ');
        }
  }

}


public function borrarImagenVendedor(){
   //Comprobar si existe
   $existeArchivo=file_exists(CARPETA_IMAGENES_VENDEDOR.$this->imagen);
   if ($existeArchivo) {
     
        unlink(CARPETA_IMAGENES_VENDEDOR.$this->imagen); 
      }
   }

}