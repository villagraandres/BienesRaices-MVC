<fieldset>
            <legend>Información general</legend>

    <label for="nombre">Nombre:</label>
    <input type="text" id="titulo" name="vendedor[vendedores]" placeholder="Nombre vendedor" value="<?php echo s($vendedor->vendedores);   ?>">
            
    <label for="apellidos">Apellidos:</label>
    <input type="text" id="apellidos" name="vendedor[apellidos]" placeholder="Apellidos del vendedor" value="<?php echo s($vendedor->apellidos);   ?>">
</fieldset>
<fieldset>
    <legend>Información extra</legend>
    <label for="apellidos">Telefono:</label>
    <input type="text" id="telefono" name="vendedor[telefono]" placeholder="telefono del vendedor" value="<?php echo s($vendedor->telefono);   ?>">
    <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="vendedor[imagen]" onchange="return pre() ">
            <div id="visorImg" >
              <?php if($vendedor->imagen):?>
                <img src="/imagenesVendedor/<?php echo $vendedor->imagen?>" class="imagen-pre" >
            <?php endif; ?> 
</fieldset>


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