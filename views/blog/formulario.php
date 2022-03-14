<fieldset>
            <legend>Información general</legend>

            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" name="blog[titulo]" placeholder="Titulo blog" value="<?php echo s($blog->titulo);   ?>">

   
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="blog[imagen]" onchange="return pre() ">
            <div id="visorImg" >
              <?php if($blog->imagen):?>
                <img src="/imagenesBlog/<?php echo $blog->imagen?>" class="imagen-pre" >
            <?php endif; ?> 

            </div>
            <label for="sinopsis">Sinopsis:</label>
            <textarea id="sinopsis" name="blog[sinopsis]"><?php echo s($blog->sinopsis);  ?></textarea>


            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="blog[descripcion]"><?php echo s($blog->descripcion);  ?></textarea>

            <label for="autor">Autor:</label>
            <input type="text" id="titulo" name="blog[autor]" placeholder="Autor del blog" value="<?php echo s($blog->autor);   ?>">

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