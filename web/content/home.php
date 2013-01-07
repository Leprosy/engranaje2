<!DOCTYPE html>
<html lang="en" dir="ltr" itemscope itemtype="http://schema.org/Article">
    <?php include('header.php') ?>

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

            <?php include('footer.php') ?>
        </div>
    </body>

    <script>
    function loadPost(link) {
        $.get(link + '?ajax=true', function(data) {
            /* Draw post */
            $('#posts section.main').html(data);
            $('head title').html($('#posts article h1').html() + ' - LEPROSYSTEMS');

            /* Render */
            $('#front').fadeOut(function() {
                $('#posts').fadeIn();
            });
        });
    }

    function loadHome() {
        /* Render */
        $('#posts').fadeOut(function() {
            $('#front').fadeIn();
        });
        $('head title').html('LEPROSYSTEMS');
    }

    $(document).ready(function() {
        $('section a, #posts h1 a').click(function() { 
            History.pushState(null, null, this.href);
            return false;
        });

        /* Bind to StateChange Event */
        History.Adapter.bind(window,'statechange',function() {
            var State = History.getState();
            if (State.url != '<?php echo BASE_URL ?>') {
                loadPost(State.url);
            } else {
                loadHome();
            }

            var url = '/' + State.url.split('<?php echo BASE_URL ?>')[1];
            _gaq.push(['_trackPageview', url]);
        });
    });
    </script>
</html>
