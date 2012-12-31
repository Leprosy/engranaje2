<!DOCTYPE html>
<html lang="en" dir="ltr" itemscope itemtype="http://schema.org/Article">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

        <title>LEPROSYSTEMS</title>

        <link rel="shortcut icon" href="/favicon.ico">
        <link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>content/css/normalize.min.css">
        <link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>content/css/main.css">
        <script src="<?php echo BASE_URL ?>content/js/modernizr.js"></script>
        <script src="<?php echo BASE_URL ?>content/js/jquery.js"></script>
    </head>

    <body>
        <header>
            <h1>Leprosystems</h1>
        </header>

        <section class="main">
            <?php foreach ($this->posts as $post) : ?>
                <article>
                    <h2><?php echo $post->title ?></h2>
                    <p class="meta">Publicado hace <?php echo Html::reldate($post->published_at) ?></p>
                </article>
            <?php endforeach; ?>
        </section>

        <footer>
            (c) <?php echo date('Y') ?> Leprosystems.com
        </footer>
    </body>
</html>
