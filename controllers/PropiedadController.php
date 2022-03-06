<?php

namespace Controllers;
use MVC\Router;
use Model\propiedad;
use Model\vendedor;
use Intervention\Image\ImageManagerStatic as Image;


class PropiedadController{
    public static function index(Router $router){
       $propiedades=propiedad::all();

      $vendedores=vendedor::all();


       $resultado = $_GET['resultado'] ?? null;

       $router->render('propiedades/admin',[
          'propiedades'=>$propiedades,
          'resultado'=>$resultado,
          'vendedores'=>$vendedores
       ]);
    }
    public static function crear(Router $router){
        
        $propiedad= new propiedad;
        $vendedores= vendedor::all();
        //Mensajes de errores
        $errores=propiedad::getErroes();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

        /* Crea una nueva instancia */
     $propiedad=new propiedad($_POST['propiedad']);
    
        $nombreImagen = md5( uniqid()).".jpg";
    //Setea la imagen
     //Realiza una resize a la img 
     if ($_FILES['propiedad']['tmp_name']['imagen']) {
       $Image=Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
       $propiedad->setImagen($nombreImagen);
     }

 
    //Validamos
   $errores=$propiedad->validar();
 
  
  
   if(empty($errores)) {

       
       //Crear carpeta
       if (!is_dir(CARPETA_IMAGENES)) {
          mkdir(CARPETA_IMAGENES);
       }
       
     
          //Guarda en el disco duro
        $Image->save(CARPETA_IMAGENES.$nombreImagen);

        //Guarda en la base de datos
        $propiedad->crear();

        //Mensaje exito
       

       }
            
        }
        
        $router->render('propiedades/crear',[
            'propiedad'=>$propiedad,
            'vendedores'=>$vendedores,
            'errores'=>$errores
        ]);

    
    }
    public static function actualizar(Router $router){
        $id= valirRedireccionar('/admin');
         $propiedad= propiedad::find($id);
         $errores=propiedad::getErroes();
         $vendedores= vendedor::all();

         if($_SERVER['REQUEST_METHOD']==='POST'){


            //Asignar atributos
        
            $args=$_POST['propiedad'];
            
        
            $propiedad->sincronizar($args);
        
            
            //Validacion   
            $errores=$propiedad->validar();
            //Nombre de la img
            $nombreImagen = md5( uniqid()).".jpg";
            
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $Image=Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
              } 
        
        
        
             
            //Revisar que el arreglo de errores este vacio
        
            if(empty($errores)) {
                // Almacenar la imagen
                if($_FILES['propiedad']['tmp_name']['imagen']) {
                    $Image->save(CARPETA_IMAGENES . $nombreImagen);
                }
        
                $propiedad->guardar();
            }
            }
            














         $router->render('/propiedades/actualizar',[
            'propiedad'=>$propiedad,
            'errores'=>$errores,
            'vendedores'=>$vendedores
            
         ]); 
    }
    public static function main(Router $router){
     
    }

    public static function eliminar(){
       if($_SERVER['REQUEST_METHOD']==='POST'){
         $id=$_POST['id'];
         $id=filter_var($id,FILTER_VALIDATE_INT  );
       
        
         if ($id) {
       
           $tipo=$_POST['tipo'];
       
           if (validarContenido($tipo)) {
            $propiedad=propiedad::find($id);
       
            $propiedad->eliminar();
           }
       
       
       
           
       
           
          
       
       }
    }
   }
}
