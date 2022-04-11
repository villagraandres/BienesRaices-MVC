
    <main class="contenedor seccion ">
        <h1>Nuestro blog</h1>
        <div class="contenido-blog  contenido-centrado  ">
        
        <article class="entrada-blog">
    <?php foreach($blogs as $blog){?>
                <div class="imagen  imagenBlog">
                
                     <img loading="lazy" src="imagenesBlog/<?php echo $blog->imagen?>" alt="Texto entrada blog">
                  
                </div>
                <div class="texto-entrada">
                    <a href="/blog?id=<?php echo $blog->id?>">
                        <h4><?php echo $blog->titulo?></h4>
                        <p class="informacion-meta">Escrito el: <span><?php echo $blog->creado?></span> por: <span><?php echo $blog->autor?></span></p>
                        <p><?php echo $blog->sinopsis?></p>
                    </a>
                </div>
                <?php }?>
             </article>
        </div>
    </main>