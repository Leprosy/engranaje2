<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Leprosystems. This is Leprosystems.com</title>    
        <meta name="description" content="aplicaciones, codigo fuente, dibujo, escritos, musica" />
        <meta name="author" content="Miguel Rojas" />
        <link href="<?php echo BASE_URL ?>view/style.css" rel="stylesheet" />
        <script src="<?php echo BASE_URL ?>view/edjs/edward.js"></script>
        <script src="<?php echo BASE_URL ?>view/jquery.js"></script>
    </head>

    <body>

        <header>
            <h1><a href="<?php echo BASE_URL ?>">LEPR0SYSTEMS</a></h1>
            <h2>QUIQUID LATINE DICTUM SIT ALTUM VIDITUR</h2>
        </header>

        <hr />

        <section id="content" class="inside_not">
            <article class="development">
                <div>
                    <h2><a href="<?php echo BASE_URL ?>term/desarrollo">Desarrollo</a></h2>
                    <p>Mis proyectos de software y afines...</p>
                </div>
            </article>

            <article class="writing">
                <div>
                    <h2><a href="<?php echo BASE_URL ?>term/letras">Letras</a></h2>
                    <p>Palabras y literatura barata...</p>
                </div>
            </article>

            <article class="drawing">
                <div>
                    <h2><a href="<?php echo BASE_URL ?>term/dibujo">Dibujo</a></h2>
                    <p>A veces me gusta pintar monos...</p>
                </div>
            </article>

            <article class="music">
                <div>
                    <h2><a href="<?php echo BASE_URL ?>term/musica">Música</a></h2>
                    <p>Mis composiciones, rock y guitarras...</p>
                </div>
            </article>
        </section>

        <hr />

        <section id="main">
            <section id="contents">
                <h3>Últimos artículos : </h3>
                <?php foreach($posts as $post) : ?>
                <article>
                    <h2><a href="<?php echo Html::permalink($post) ?>"><?php echo $post->title ?></a></h2>
                    <p class="meta"><?php echo Html::reldate($post->published_at) ?></p>
                </article>
                <?php endforeach; ?>
            </section>

            <aside>
                <div>
                    <h3>Contacto</h3>
                    <ul>
                        <li><a target="_blank" href="http://twitter.com/leprosy/">Twitter</a></li>
                        <li><a target="_blank" href="http://www.facebook.com/don.leprosy/">Facebook</a></li>
                        <li><a target="_blank" href="http://github.com/leprosy/">Github</a></li>
                    </ul>
                </div>

                <hr />

                <div>
                    <h3>CC</h3>
                </div>
            </aside>
        </section>

        <script>
            $(document).ready(function() {
                Edward.init('#content', {
                    timeBetween: 500,
                    transition: 'fade'
                });
            })
        </script>

	</body>
</html>
