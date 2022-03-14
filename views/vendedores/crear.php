<main class="contenedor seccion">

    <h1>Registrar Vendedor</h1>
    <a href="/admin" class="boton-verde">Volver</a>
    <?php foreach($errores as $error): ?>
        <div class="alerta error">
             <?php echo $error   ?>
        </div>
        

    <?php endforeach?>

    <form class="formulario" method="POST"  enctype="multipart/form-data" action="/vendedor/crear">
        <?php include __DIR__. '/formulario.php' ?>

        <input type="submit" value="Registrar vendedor" class="boton-verde">
    </form>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    function pre(){
        if (archivoInput.files && archivoInput.files[0]) {
        var visor= new FileReader();
        visor.onload=function(e){
            document.getElementById('visorImg').innerHTML=
            '<img class="imagen-pre" src="'+e.target.result+'"   >';
        }
        visor.readAsDataURL(archivoInput.files[0])
    }
    }
    var archivoInput=document.getElementById('imagen');
 
</script> 
