<main class="contenedor seccion">

  <h1>Administrador</h1>
  <?php
  if($resultado){
    $mensaje=mostrarNotificacion( intval($resultado));
    if ($mensaje) {?>
     <p class="alerta exito"><?php echo s($mensaje) ?></p>
   <?php }
}
    ?>

  
  
  



  <a href="/propiedades/crear" class="boton-verde">Nueva propiedad</a>
  <a href="/admin/blog/crear.php" class="boton-verde">Nuevo articulo</a>
  <a href="/vendedor/crear" class="boton-amarillo">Nuevo vendedor</a>
    <div class="contenedor tabla-container">
      <h2>Propiedades</h2>
    <table class="propiedades">
    <thead>
      <tr>
        <th>ID</th>
        <th>Titulo</th>
        <th>Imagen</th>
        <th>Precio</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody><!-- Mostrar los resultados -->
      <?php foreach($propiedades as $propiedad): ?>
       
      <tr class="propiedad">
        <td><?php echo $propiedad->id ;   ?></td>
        <td><?php echo $propiedad->titulo ;  ?></td>
        <td> <img src="/imagenes/<?php echo $propiedad->imagen ?>" class="imagen-tabla"> </td>
        <td><?php echo  $propiedad->precio?></td>
        
        <td>
          <form method="POST" class="w-100" action="/propiedades/eliminar">

        <input type="hidden" name="id" value="<?php echo $propiedad->id;?>">
        <input type="hidden" name="tipo" value="propiedad">




          <input type="submit"  class="boton-rojo-block" value="Eliminar"></input>
          </form>
          
          <a href="/propiedades/actualizar?id=<?php  echo $propiedad->id; ?>" class="boton-amarillo-block">Actualizar</a>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>

  <h2>Vendedores</h2>
      <table class="propiedades">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Telefono</th>
        <th>Imagen</th>
        <th>Acciones</th>
    
      </tr>
    </thead>
    <tbody><!-- Mostrar los resultados -->
      <?php foreach($vendedores as $vendedor): ?>
       
      <tr class="propiedad">
        <td><?php echo $vendedor->id ;   ?></td>
        <td><?php echo $vendedor->vendedores." ".$vendedor->apellidos ;  ?></td>
        <td><?php echo  $vendedor->telefono?></td>
        <td> <img src="/imagenesVendedor/<?php echo $vendedor->imagen ?>" class="imagen-tabla"> </td>
        
        <td>
          <form method="POST" class="w-100">

         <input type="hidden" name="id" value="<?php echo $vendedor->id;?>">
         <input type="hidden" name="tipo" value="vendedor">




          <input type="submit"  class="boton-rojo-block" value="Eliminar"></input>
          </form>
          
          <a href="/admin/vendedores/actualizar.php?id=<?php  echo $vendedor->id; ?>" class="boton-amarillo-block">Actualizar</a>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
  

      </main>