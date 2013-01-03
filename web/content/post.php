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
        <div class="page inside">
            <header>
                <h1><a href="<?php echo BASE_URL ?>">Leprosystems</a></h1>
            </header>
    
            <section class="main">
                <article>
                    <h1><?php echo $this->post->title ?></h1>
                    <p class="meta">Publicado el <?php echo $this->post->published_at ?></p>
                    <section class="content">
                        <?php echo $this->post->content; ?>
                    </section>
                </article>
            </section>
    
            <footer>
                (c) <?php echo date('Y') ?> Leprosystems.com
            </footer>
        </div>
    </body>
</html>
