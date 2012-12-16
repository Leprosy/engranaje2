<?php
var_dump($_GET);

/* Definitions */
$base_url = 'http://localhost/labs/engranaje2/web/';

/* Functions */
function permalink($post) {
    global $base_url;
    $date = explode('-', $post->published_at);
    return sprintf("%s%s/%s/%s", $base_url, $date[0], $date[1], $post->slug);
}

function reldate($str) {
    return "Hace eones";
}

/* Preparing data */
$ch = curl_init();
$timeout = 5;
$url = 'http://localhost/labs/engranaje2/server/index.php?module=node&limit=4';
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$posts = json_decode(curl_exec($ch));
curl_close($ch);

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Leprosystems S.A.</title>    
        <meta name="description" content="aplicaciones, codigo fuente, dibujo, escritos, musica" />
        <meta name="author" content="Miguel Rojas" />
        <link href="<?php echo $base_url ?>style.css" rel="stylesheet" />
        <script src="<?php echo $base_url ?>edjs/edward.js"></script>
        <script src="<?php echo $base_url ?>jquery.js"></script>
    </head>

    <body>

        <header>
            <h1><a href="<?php echo $base_url ?>">LEPR0SYSTEMS</a></h1>
            <h2>QUIQUID LATINE DICTUM SIT ALTUM VIDITUR</h2>
        </header>

        <hr />

        <section id="content" class="inside_not">
            <article class="development">
                <div>
                    <h2><a href="<?php echo $base_url ?>term/desarrollo">Desarrollo</a></h2>
                    <p>Mis proyectos de software y afines...</p>
                </div>
            </article>

            <article class="writing">
                <div>
                    <h2><a href="<?php echo $base_url ?>term/letras">Letras</a></h2>
                    <p>Palabras y literatura barata...</p>
                </div>
            </article>

            <article class="drawing">
                <div>
                    <h2><a href="<?php echo $base_url ?>term/dibujo">Dibujo</a></h2>
                    <p>A veces me gusta pintar monos...</p>
                </div>
            </article>

            <article class="music">
                <div>
                    <h2><a href="<?php echo $base_url ?>term/musica">Música</a></h2>
                    <p>Mis composiciones, rock y guitarras...</p>
                </div>
            </article>
        </section>

        <hr />

        <section id="main">
            <section id="contents">
                <?php foreach($posts as $post) : ?>
                <article>
                    <h2><a href="<?php echo permalink($post) ?>"><?php echo $post->title ?></a></h2>
                    <p class="meta"><?php echo reldate($post->published_at) ?></p>
                    <!-- <p class="read"><a href="#">Ver más...</a></p> -->
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
