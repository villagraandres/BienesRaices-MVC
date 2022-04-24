<?php
namespace Controllers;
use MVC\Router;
use Model\vendedor;
use Intervention\Image\ImageManagerStatic as Image;
class VendedorController{

    public static function crear(Router $router){

        $vendedores= new vendedor();

        $errores= vendedor::getErroes();



        if($_SERVER['REQUEST_METHOD']==='POST'){

            $vendedor=new vendedor($_POST['vendedor']);
        
            //Validar
        
        
            // Generar un nombre único
            $nombreImagen = md5( uniqid()).".jpg";
          
            
            //Setea la imagen
             //Realiza una resize a la img 
             if ($_FILES['vendedor']['tmp_name']['imagen']) {
               $Image=Image::make($_FILES['vendedor']['tmp_name']['imagen'])->fit(800,600);
               $vendedor->setImagen($nombreImagen,CARPETA_IMAGENES_VENDEDOR);
             }
           
             $errores=$vendedor->validar();
        
        
            //Si no hay errores
            if(empty($errores)){
                 
                if (!is_dir(CARPETA_IMAGENES_VENDEDOR)) {
                    mkdir(CARPETA_IMAGENES_VENDEDOR);
                 }
                 
               
                    //Guarda en el disco duro
                 /*  $Image->save(CARPETA_IMAGENES_VENDEDOR.$nombreImagen); */
                $vendedor->guardar();
            }
        
        
        }

        $router->render('vendedores/crear',[
            'vendedor'=>$vendedores,
            'errores'=>$errores
        ]);
    }

    public static function actualizar(Router $router){

        $id=valirRedireccionar('/admin');
        $vendedor= vendedor::find($id);
        $errores=vendedor::getErroes();
        
        if($_SERVER['REQUEST_METHOD']==='POST'){
            //Asignar valores
            $args=$_POST['vendedor'];
            
            $vendedor->sincronizar($args);
            
            //Validacion
            $errores=$vendedor->validar();
            
            if (empty($errores)) {
                $vendedor->guardar();
            }
            
            }
            
        $router->render('vendedores/actualizar',[
            'errores'=>$errores,
            'vendedor'=>$vendedor
        ]);

    }
    public static function eliminar(){
       if ($_SERVER['REQUEST_METHOD']==='POST') {
          
         

           //validar el id
           $id=$_POST['id'];
           $id=filter_var($id,FILTER_VALIDATE_INT);
           if ($id) {
            $tipo=$_POST['tipo'];
            if(validarContenido($tipo)){
                $vendedor=vendedor::find($id);
                $vendedor->eliminar();
            }
           }
       }
    }

}

