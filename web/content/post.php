<?php 
$content = '
<article>
    <h1>' . $this->post->title . '</h1>
    <p class="meta">Publicado el ' . $this->post->published_at . '</p>
    <section class="content">
        ' . $this->post->content . '
    </section>
</article>

<div id="social">
    <a href="https://twitter.com/share" class="twitter-share-button" data-lang="es">Twittear</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

    <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.google.com&amp;send=false&amp;layout=button_count&amp;width=150&amp;show_faces=false&amp;font=arial&amp;colorscheme=light&amp;action=like&amp;height=21&amp;appId=173861706020705" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:150px; height:21px;" allowTransparency="true"></iframe>
</div>
';

if (isset($_GET['ajax'])) {
    die($content);
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr" itemscope itemtype="http://schema.org/Article">
    <?php include('header.php') ?>

    <body>
        <div class="page inside">
            <header>
                <h1><a href="<?php echo BASE_URL ?>">Leprosystems</a></h1>
            </header>

            <section class="main">
                <?php echo $content; ?>
            </section>

            <?php include('footer.php') ?>
        </div>
    </body>
</html>
