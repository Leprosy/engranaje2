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
        <script src="<?php echo BASE_URL ?>content/js/history.js"></script>
    </head>

    <body>
        <div class="page">
            <div id="front">
                <header>
                    <h1><a href="<?php echo BASE_URL ?>">Lepr0systems</a></h1>
                </header>
        
                <section class="main">
                    <?php foreach ($this->posts as $post) : ?>
                        <article>
                            <h2><a href="<?php echo Html::permalink($post) ?>"><?php echo $post->title ?></a></h2>
                            <p class="meta">Publicado hace <?php echo Html::reldate($post->published_at) ?></p>
                            <p><?php echo $post->description; ?></p>
                        </article>
                    <?php endforeach; ?>
                </section>
            </div>

            <div id="posts" class="inside">
                <header>
                    <h1><a href="<?php echo BASE_URL ?>">Lepr0systems</a></h1>
                </header>
                <section class="main">
                    <article>
                        <h1></h1>
                        <p class="meta"></p>
                        <section class="content"></section>
                    </article>
                </section>
            </div>

            <footer>
                <p>(c) <?php echo date('Y') ?> Leprosystems.com</p>
                <p>
                    <a href="http://twitter.com/leprosy" class="">Twitter</a>
                </p>
            </footer>
        </div>
    </body>

    <script>
    function loadPost(slug) {
        $.get('<?php echo SERVER_URL ?>?module=node&id=' + slug, function(data) {
            var data = data[0];

            /* Draw post */
            $('#posts article h1').html(data.title);
            $('#posts .meta').html('Publicado el ' + data.published_at);
            $('#posts .content').html(data.content);

            /* Render */
            $('#front').fadeOut(function() {
                $('#posts').fadeIn();
            });

            /* Change URL */
            var date = data.published_at.split('-');
            History.pushState(null, null, date[0] + '/' + date[1] + '/' + data.slug);
        });
    }

    $(document).ready(function() {
        $('section a').click(function() {
            var slug = this.href.split('<?php echo BASE_URL ?>')[1].split('/')[2];
            loadPost(slug);
            return false;
        });

        /* Bind to StateChange Event */
        History.Adapter.bind(window,'statechange',function() {
            var State = History.getState();
            History.log(State.data, State.title, State.url);
        });
    });
    </script>
</html>
