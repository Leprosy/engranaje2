<?php
/* Preparing data */
$posts = json_decode(file_get_contents('http://localhost/labs/engranaje2/server/index.php?module=node&limit=4'));
 
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Leprosystems S.A.</title>    
        <meta name="description" content="aplicaciones, codigo fuente, dibujo, escritos, musica" />
        <meta name="author" content="Miguel Rojas" />
        <link href="style.css" rel="stylesheet" />
        <script src="edjs/edward.js"></script>
        <script src="jquery.js"></script>
    </head>

    <body>

        <header>
            <h1>LEPR0SYSTEMS</h1>
            <h2>QUIQUID LATINE DICTUM SIT ALTUM VIDITUR</h2>
        </header>

        <hr />

        <section id="content" class="inside_not">
            <article class="development">
                <div>
                    <h2><a href="term/desarrollo">Desarrollo</a></h2>
                    <p>Mis proyectos de software y afines...</p>
                </div>
            </article>

            <article class="writing">
                <div>
                    <h2><a href="term/letras">Letras</a></h2>
                    <p>Palabras y literatura barata...</p>
                </div>
            </article>

            <article class="drawing">
                <div>
                    <h2><a href="term/dibujo">Dibujo</a></h2>
                    <p>A veces me gusta pintar monos...</p>
                </div>
            </article>

            <article class="music">
                <div>
                    <h2><a href="term/musica">Música</a></h2>
                    <p>Mis composiciones, rock y guitarras...</p>
                </div>
            </article>
        </section>

        <hr />

        <section id="main">
            <section id="contents">
                <?php foreach($posts as $post) : ?>
                <article>
                    <h2><?php echo $post->title ?></h2>
                    <p class="meta">Hace eones</p>
                    <p class="read"><a href="#">Ver más...</a></p>
                </article>
                <?php endforeach; ?>
            </section>

            <aside>
                <div>
                    <h3>Hello</h3>
                    <p>hola</p>
                </div>

                <hr />

                <div>
                    <h3>Hello</h3>
                    <p>hola</p>
                </div>
            </aside>
        </section>

        <script>
            $(document).ready(function() {
                Edward.init('#content', {
                    timeBetween: 500,
                    transition: 'slide'
                });
            })
        </script>

	</body>
</html>
