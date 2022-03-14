<?php
namespace Controllers;

use Model\blog;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;
class BlogController{

 public static function crear(Router $router){
        $blog= new blog();
        
        //Mensajes de errores
        $errores=blog::getErroes();

        if($_SERVER['REQUEST_METHOD']==='POST'){



            /* Crea una nueva instancia */
        $blog=new blog($_POST['blog']);
        
       
    
         // Crear carpeta
       
    
        
    
         // Generar un nombre único
         $nombreImagen = md5( uniqid()).".jpg";
         //Setea la imagen
          //Realiza una resize a la img 
          if ($_FILES['blog']['tmp_name']['imagen']) {
            $Image=Image::make($_FILES['blog']['tmp_name']['imagen'])->fit(800,600);
            $blog->setImagen($nombreImagen,CARPETA_IMAGENES_BLOG);
          }
        
    
         //Validamos
        $errores=$blog->validar();
      
       
       
        if(empty($errores)) {
    
            
            //Crear carpeta
            if (!is_dir(CARPETA_IMAGENES_BLOG)) {
               mkdir(CARPETA_IMAGENES_BLOG);
            }
            
          
               //Guarda en el disco duro
             $Image->save(CARPETA_IMAGENES_BLOG.$nombreImagen);
    
             //Guarda en la base de datos
              $blog->crear();
             
    
             //Mensaje exito
            
    
            }
        }

    $router->render('blog/crear',[
        'errores'=>$errores,
        'blog'=>$blog
    ]);
 }

public static function actualizar(Router $router){
    $id= valirRedireccionar('/admin');
    $blog=blog::find($id);
    
    $errores=blog::getErroes();

    if($_SERVER['REQUEST_METHOD']==='POST'){


        //Asignar atributos
        
        $args=$_POST['blog'];
        
    
        $blog->sincronizar($args);
    
        
        //Validacion   
        $errores=$blog->validar();
        //Nombre de la img
        $nombreImagen = md5( uniqid()).".jpg";
        
        if ($_FILES['blog']['tmp_name']['imagen']) {
            $Image=Image::make($_FILES['blog']['tmp_name']['imagen'])->fit(800,600);
            $blog->setImagen($nombreImagen,CARPETA_IMAGENES_BLOG);
          } 
    
    
    
         
        //Revisar que el arreglo de errores este vacio
    
        if(empty($errores)) {
            // Almacenar la imagen
            if($_FILES['blog']['tmp_name']['imagen']) {
                $Image->save(CARPETA_IMAGENES_BLOG . $nombreImagen);
            }
    
            $blog->guardar();
        }
        }
        
    


    $router->render('blog/actualizar',[
       'errores'=>$errores,
       'blog'=>$blog
    ]);
}






 public static function ver(Router $router){



    $router->render('blog/ver',[
       
    ]);
 }

}