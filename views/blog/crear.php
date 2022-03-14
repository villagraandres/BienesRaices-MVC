<main class="contenedor seccion">

    <h1>Crear</h1>
    <a href="/admin" class="boton-verde">Volver</a>
    <?php foreach($errores as $error): ?>
        <div class="alerta error">
             <?php echo $error   ?>
        </div>
        

    <?php endforeach?>

    <form class="formulario" method="POST" enctype="multipart/form-data" action="/blog/crear">
        <?php include 'formulario.php' ?>

        <input type="submit" value="Crear blog" class="boton-verde">
    </form>
</main>