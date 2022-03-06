<?php
namespace Model;
  
class blog extends ActiveRecord{
  protected static $tabla='blog';
  protected static $columnasDB=['id','titulo','creado','descripcion','imagen','autor','sinopsis'];

  public $id;
  public $titulo;
  public $creado;
  public $descripcion;
  public $imagen;
  public $autor;
  public $sinopsis;

  public function __construct($args=[])
 {
     
   $this->id=$args['id']?? null;
   $this->titulo=$args['titulo']??'';
   $this->creado=date('Y/m/d');
   $this->descripcion=$args['descripcion']??'';
   $this->imagen=$args['imagen']??''; 
   $this->autor=$args['autor']??''; 
   $this->sinopsis=$args['sinopsis']??''; 
   
     
    
 }
 public function validar(){
  if (!$this->titulo) {
    self::$errores[]="Debes añadir un titulo"; 
 }

 if (!$this->descripcion) {
    self::$errores[]="Debes añadir una descripcion"; 
 }
 
if (strlen(!$this->autor) ) {
    self::$errores[]="Debes añadir un autor"; 
 }
if (strlen(!$this->sinopsis) ) {
    self::$errores[]="Debes añadir una sinopsis"; 
 }
 
   if (strlen(!$this->imagen) ) {
  self::$errores[]="Debes añadir una imagen"; 
}  




return self::$errores;
}
public function eliminarBlog(){
  //elimina propiedad
 $query="DELETE FROM ". self::$tabla." WHERE id=". self::$db->escape_string($this->id) ." LIMIT 1";
 $resultado=self::$db->query($query);

 if ($resultado) {
     $this->borrarImagenBlog();
     if ($resultado) {
         header('location:/admin?resultado=3 ');
       }
 }

}
public function borrarImagenBlog(){
  //Comprobar si existe
  $existeArchivo=file_exists(CARPETA_IMAGENES_BLOG.$this->imagen);
  if ($existeArchivo) {
      unlink(CARPETA_IMAGENES_BLOG.$this->imagen);
  }
}


}

