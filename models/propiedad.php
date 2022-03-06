<?php

namespace Model;

class propiedad extends ActiveRecord{
   
    protected static $tabla='propiedades';
    protected static $columnasDB=['id','titulo','precio','imagen','descripcion','habitaciones','wc','estacionamiento','creado','vendedorId','sinopsis'];
   protected static $ruta='\includes/../imagenes/06d2ea873f747d06391341c8999c9e10.jpg';
    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public  $creado;
    public $vendedorId;
    public $sinopsis;

    public function __construct($args=[])
 {
     
     $this->id=$args['id']?? null;
     $this->titulo=$args['titulo']?? '';
     $this->precio=$args['precio']?? '';
     $this->imagen=$args['imagen']?? '';
     $this->descripcion=$args['descripcion']?? '';
     $this->habitaciones=$args['habitaciones']?? '';
     $this->wc=$args['wc']?? '';
     $this->estacionamiento=$args['estacionamiento']?? '';
     $this->creado=date('Y/m/d');
     $this->vendedorId=$args['vendedorId']?? ''; 
     $this->sinopsis=$args['sinopsis']?? '';
    
 }
 public function validar(){
    if (!$this->titulo) {
        self::$errores[]="Debes añadir un titulo"; 
     }

     if (!$this->precio) {
        self::$errores[]="Debes añadir un precio"; 
     }
     
    if (strlen($this->descripcion)<20 ) {
        self::$errores[]="Debes añadir una descripcion con mas de 20 caracteres"; 
     }
    if (strlen($this->sinopsis)>30 ) {
        self::$errores[]="Debes añadir una sinopsis no mayor a 20 caracteres"; 
     }
    
     
    if (!$this->habitaciones) {
        self::$errores[]="Debes añadir una habitacion"; 
     }
    if (!$this->wc) {
        self::$errores[]="Debes añadir un wc"; 
     }
    if (!$this->estacionamiento) {
        self::$errores[]="Debes añadir un estacionamiento"; 
     }
    if (!$this->vendedorId) {
        self::$errores[]="Elige un vendedor"; 
     }
      if (!$this->imagen) {
        self::$errores[]="La imagen es obligatoria";
     }

   
    return self::$errores;
}


}

  
