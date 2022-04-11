<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad; 
use Model\blog;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{
    public static function index(Router $router){
       $propiedades=propiedad::get(3);
       $blogs=blog::get(3);
       $inicio=true;
        $router->render('paginas/index',[
            'propiedades'=>$propiedades,
            'inicio'=>$inicio,
            'blogs'=>$blogs
        ]);
    }
    public static function nosotros(Router $router){
        $router->render('paginas/nosotros',);
    }
    public static function propiedades(Router $router){
        $propiedades=propiedad::all();
        $router->render('paginas/propiedades',[
            'propiedades'=>$propiedades
        ]);
    }
    public static function propiedad(Router $router){
        $id=valirRedireccionar('/');
        
        $propiedad=propiedad::find($id);
        $router->render('paginas/propiedad',[
            'propiedad'=>$propiedad
        ]);
    }
    public static function blog(Router $router){
        $id=valirRedireccionar('/');    
        $blog=blog::find($id);
        $router->render('paginas/entrada',[
            'blog'=>$blog
        ]);
    }

    public static function blogAll(Router $router){
        $blog=blog::all();
        $router->render('paginas/blogAll',[
            'blogs'=>$blog
        ]);
    }
  
    public static function contacto(Router $router){

        $mensaje=null;



        if($_SERVER['REQUEST_METHOD']==='POST'){

            

            $respuestas=$_POST['contacto'];
            
           //Crear una instancia de PHPmailer
            $mail= new PHPMailer;
            //Configurar SMTP
            $mail->isSMTP();
            $mail->Host= 'smtp.mailtrap.io';
            $mail->SMTPAuth=true;
            $mail->Username='d98386aff043cd';
            $mail->Password='ad9a6874b4b037';
            $mail->SMTPSecure='tls';
            $mail->Port= 2525;

            //Configurar el conetenido
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('adimin@bienesraices.com','BienesRaices.com');
            $mail->Subject='Tienes un nuevo mensaje';

            //Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet='UTF-8';

          
            //Definir contenido
            $contenido= '<html>';
            $contenido.=' <p> Tienes un nuevo mensaje</p>';
            $contenido.=' <p> Nombre: ' .  $respuestas['nombre'] . '</p>';
           

            //Enviar de forma condicional

            if ($respuestas['contacto']==='telefono') {
                  $contenido.='<p>Eligio ser contactado por telefono</p>';
                  $contenido.=' <p> Telefono: ' .  $respuestas['telefono'] . '</p>';
                  $contenido.=' <p> Fecha: ' .  $respuestas['fecha'] . '</p>';
                  $contenido.=' <p> Hora: ' .  $respuestas['hora'] . '</p>';
            }else{
             $contenido.='<p>Eligio ser contactado por email</p>';
             $contenido.=' <p> Email: ' .  $respuestas['email'] . '</p>';
            }
          
            $contenido.=' <p> Mensaje: ' .  $respuestas['mensaje'] . '</p>';
            $contenido.=' <p> Vende o compra: ' .  $respuestas['tipo'] . '</p>';
            $contenido.=' <p> Precio o presupuesto:  $' .  $respuestas['precio'] . '</p>';
            $contenido.=' <p> Prefiere ser contactado por: ' .  $respuestas['contacto'] . '</p>';
           
            $contenido.=' </html>';
            

            $mail->Body= $contenido;
            $mail->AltBody='Texo alternativo';

            //Enviar el email
           if( $mail->send()){
              $mensaje="Mensaje enviado correctamente";
           }else{
               echo "El mensaje no se pudo enviar";
           }

        }
       $router->render('paginas/contacto',[
        'mensaje'=>$mensaje
       ]);
    }
   
}