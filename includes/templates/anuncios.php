<?php
 //Impotar db

 use App\propiedad;


if ($_SERVER['SCRIPT_NAME']==='/anuncios.php') {
    $propiedades=propiedad::all();
}else{
    $propiedades=propiedad::get(3);

}

/* $limiteBlog=3;
 */ function truncate(string $texto, int $cantidad) : string
 {
     if(strlen($texto) >= $cantidad) {
         return substr($texto, 0, $cantidad) . "...";
     } else {
         return $texto;
     }
 }
 


 
 ?>
 
 
 
 
 
 
 
 
 <div class="contenedor-anuncios">
     <?php foreach($propiedades as $propiedad){?>
            <div class="anuncio">
                    <div class="entradaContenedor">
                    <img loadinf="lazy" class="imagenPropiedad" src="imagenes/<?php echo $propiedad->imagen?>" alt="anuncio">
                    </div>
                  
                   
             
                <div class="contenido-anuncio">
                    <h3><?php
                   
                    echo $propiedad->titulo?></h3>
                    <p class="overflow-ellipsis"><?php echo $propiedad->sinopsis?></p>
                    <p class="precio">$<?php echo $propiedad->precio?></p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img  class="icono" src="build/img/icono_wc.svg" alt="icono wc">
                            <p><?php echo $propiedad->wc?></p>
                        </li>
                        <li>
                            <img  class="icono" src="build/img/icono_estacionamiento.svg" alt="icono wc">
                            <p><?php echo $propiedad->estacionamiento?></p>
                        </li>
                        <li>
                            <img  class="icono" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                            <p><?php echo $propiedad->habitaciones?></p>
                        </li>
                    </ul>
                    <a href="anuncio.php?id=<?php echo $propiedad->id?>" class="boton-amarillo-block">
                        Ver Propiedad
                    </a>
                </div> <!-- contenido anuncio -->
            </div><!-- anuncio -->
          <?php }?>



        </div><!-- contenedor anuncio -->
        <?php
   
        ?>