<?php

use Model\blog;




$id= valirRedireccionar('/admin');
$blog=blog::find($id);

?>


<main class="contenedor seccion contenido-centrado">
    <h1><?php echo $blog->titulo?></h1>
   
    <div class="entradaContenedor">
    
    <img src="/imagenesBlog/<?php echo $blog->imagen?>"  class="imgBlog">

    </div>      
       
   
    <p class="informacion-meta">Escrito el <span><?php echo $blog->creado?> </span>por: <span><?php echo $blog->autor?></span></p>

    <div class="resumen-propiedad">
        
       
       
        <p><?php echo $blog->descripcion?></p>
    </div>
    </main>







