<?php
function conectarDB(): mysqli{
    $db=new mysqli('localhost','root','root','bienes_raices');
    $db->set_charset('utf8');



   if(!$db){
       echo "Erro no se puedo conectar";
       exit;
   }
   return $db;
}


function conectarDB2(): mysqli{
    $db=mysqli_connect('localhost','root','root','bienes_raices');
    $db->set_charset('utf8');



   if(!$db){
       echo "Erro no se puedo conectar";
       exit;
   }
   return $db;
}