<main class="contenedor seccion ">
        <h1>Contacto</h1>

  
        
        <?php     if ($mensaje) {?>
           <p class='alerta exito'><?php echo $mensaje  ?></p>
       <?php }?>
        
        <div class="contenedor-imagen">
            <picture>
                <source srcset="build/img/destacada3.webp" type="image/webp">
                <source srcset="build/img/destacada3.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen Contacto">
            </picture>
    </div>
        <h2>Llene el formulario de contacto</h2>
        <form class="formulario" action="/contacto" method="POST">
            <fieldset>
                <legend>Información personal</legend>
                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu nombre" id="nombre" name="contacto[nombre]" >

              
               

                <label for="mensaje">Mensaje:</label>
               <textarea  id="mensaje" name="contacto[mensaje]" ></textarea>
            </fieldset>
            <fieldset>
                <legend>Información sobre la Propiedad</legend>
                <label for="opcion">Vende o compra</label>
                <select  id="opcion" name="contacto[tipo]" >
                    <option value="" disabled selected>--Seleccione--</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Presupuesto</label>
                <input type="number" placeholder="Tu precio o presupuesto" id="presupuesto" name="contacto[precio]" >
            </fieldset>
            
            <fieldset>
                <legend>Contacto</legend>
                <p>Como desea ser contactado</p>
                <div class="forma-contacto">
                    <label for="contactactar-telefono">Telefono</label>
                    <input  type="radio" value="telefono" id="contactar-telefono"  name="contacto[contacto]">

                    <label for="contactactar-email">Email</label>
                    <input  type="radio" value="email" id="contactar-email"  name="contacto[contacto]">
                </div>

                <div id="contacto">

                </div>
               
            </fieldset>
            <input  type="submit" value="Enviar" class="boton-verde formulario-boton">
        </form>
    </main>