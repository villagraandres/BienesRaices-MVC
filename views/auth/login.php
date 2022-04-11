
<main class="contenedor seccion contenido-centrado">




  <h1 data-cy="heading-login">Iniciar Sesión</h1>
  <?php foreach ($errores as $error) : ?>
    <div data-cy="alerta-login" class="alerta error"><?php echo $error;?></div>
  <?php endforeach; ?>
  <form data-cy="formulario-login" method="POST" class="formulario" action="/login">
    <fieldset>
      <legend>Email y Password</legend>
    
      <label for="email">Email</label>
      <input type="email" name="email" placeholder="corroejemplo@correo.con" id="email">

      <label for="password">Password</label>
      <input type="password" name="password" placeholder="Tu contraseña" id="password">
      <label for="">Mostrar contraseña:<input class="check" type="checkbox" onclick="myFunction()" id=""></label>

    </fieldset>

    <input type="submit" value="Iniciar Sesión" class="boton-verde">
  </form>

</main>