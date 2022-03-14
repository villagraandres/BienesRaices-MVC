<?php
define('TEMPLATES_URL',__DIR__ . '/templates');
define('FUNCIONES_URL',__DIR__ . 'funciones.php');
define('CARPETA_IMAGENES',$_SERVER['DOCUMENT_ROOT'].'/imagenes/');
/* define('CARPETA_IMAGENES_VENDEDOR',__DIR__.'/../imagenesVendedor/');
define('CARPETA_IMAGENES_BLOG',__DIR__.'/../imagenesBlog/');
 */
define('CARPETA_IMAGENES_VENDEDOR',$_SERVER['DOCUMENT_ROOT'].'/imagenesVendedor/');
define('CARPETA_IMAGENES_BLOG',$_SERVER['DOCUMENT_ROOT'].'/imagenesBlog/');


function incluirTemplate( string $nombre, bool $inicio=false){
    include TEMPLATES_URL . "/${nombre}.php";
}

 function autenticado(){
     session_start();
   
    if (!$_SESSION['login']) {
        header('Location:/');
    } 

    
  

  
  
} 

function debugear($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
exit;
}

//Escapa del HTML

function s($html):string{
    $s=htmlspecialchars($html);
    return $s;
}
//Validar tipo de contenido
function validarContenido($tipo){
$tipos=['vendedor','propiedad'];
return in_array($tipo,$tipos);
}

//Muestra los mensajes

function mostrarNotificacion($codigo){
    $mensaje='';
    switch($codigo){
        case 1:
            $mensaje='Creado correctamente';    
            break;
        case 2:
            $mensaje='Actualizado correctamente';    
            break;  
        case 3:
            $mensaje='Eliminado correctamente';    
            break; 

            default:
            $mensaje=false;
            break;
    }

    return $mensaje;
}

function valirRedireccionar(string $url){
    //Validar que el id de URL sea valido
    $id=$_GET['id'];
    $id=filter_var($id,FILTER_VALIDATE_INT );
    if (!$id) {
    header("Location:${url}");
    }
    return $id;
}