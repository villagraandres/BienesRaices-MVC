<fieldset>
            <legend>Información general</legend>

            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Titulo propiedad" value="<?php echo s($propiedad->titulo);   ?>">

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="propiedad[precio]" placeholder="Precio propiedad"  value="<?php echo s($propiedad->precio);  ?>">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]" onchange="return pre() ">
            <div id="visorImg" >
              <?php if($propiedad->imagen):?>
                <img src="/imagenes/<?php echo $propiedad->imagen?>" class="imagen-pre" >
            <?php endif; ?> 

            </div>
            <label for="sinopsis">Sinopsis:</label>
            <textarea id="sinopsis" name="propiedad[sinopsis]"><?php echo s($propiedad->sinopsis);  ?></textarea>


            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="propiedad[descripcion]"><?php echo s($propiedad->descripcion);  ?></textarea>

        </fieldset>
        <fieldset>
            <legend>Informacion propiedad </legend>

            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" name="propiedad[habitaciones]" placeholder="Ej: 3" min="1" max="9"  value="<?php echo s($propiedad->habitaciones);  ?>">


            <label for="baños">Baños:</label>
            <input type="number" id="baños" name="propiedad[wc]" placeholder="Ej: 3" min="1" max="9"  value="<?php echo s($propiedad->wc);  ?>">

            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" placeholder="Ej: 3" min="1" max="9"  value="<?php echo s($propiedad->estacionamiento);  ?>">



        </fieldset>

       <fieldset>
            <legend>Vendedor</legend>
            <label for="vendedor">Vendedor</label>
            <select name="propiedad[vendedorId]" id="vendedor">
                <option selected value="">--Seleccione--</option>
            <?php foreach($vendedores as $vendedor) {?>

                <option
                
                <?php echo $propiedad->vendedorId===$vendedor->id ? 'selected':'';?>
                
                value="<?php echo s($vendedor->id)  ?>" ><?php echo s($vendedor->vendedores). " ". s($vendedor->apellidos);?></option>
            <?php } ?>
            </select>
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