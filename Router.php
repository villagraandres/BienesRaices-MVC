<?php
namespace MVC;
class Router{

    public $rutasGET=[];
    public $rutasPOST=[];

    public function get($url,$fn){
        $this->rutasGET[$url]=$fn;
    }
    public function post($url,$fn){
        $this->rutasPOST[$url]=$fn;
    }

    public function comprobarURL(){

        session_start();
        $auth=$_SESSION['login'] ?? null;

        
        //Arreglo de rutas protegidas

        $rutas_protegidas= ['/admin','/propiedades/crear','/propiedades/actualizar','/propiedades/eliminar,','/vendedor/crear','/vendedor/actualizar','/vendedor/eliminar'];


        $urlActual=$_SERVER['PATH_INFO'] ?? '/';
        $metodo= $_SERVER['REQUEST_METHOD'];
     
        if ($metodo==='GET') {
           $fn= $this->rutasGET[$urlActual] ?? null;
        }else{
            
            $fn= $this->rutasPOST[$urlActual] ?? null;
        }
        //Proteger las rutas
        //Reisamos si la url actual esta en el arreglo de rutas protegidas
        //Le pasas un string al arreglo de rutas protegidas
        if (in_array($urlActual,$rutas_protegidas) && !$auth ) {
           header('Location: /');
           
        }
        if ($fn) {
           //La url existe
      
           call_user_func($fn,$this);
          
        }else{
            echo "pagina no encontrada";
        }
    }

    //Muestra la vista
    public function render($view,$datos=[]){
        
        foreach($datos as $key=>$value){
            $$key=$value;
        }

        ob_start();
        include __DIR__ . "/views/$view.php";

        $contenido=ob_get_clean();

        include __DIR__. "/views/layout.php";
    }
}