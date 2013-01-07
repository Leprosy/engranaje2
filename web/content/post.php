<?php 
$url = BASE_URL . $_GET['url'];
$content = '
<article>
    <h1>' . $this->post->title . '</h1>
    <p class="meta">Publicado el ' . $this->post->published_at . '</p>
    <section class="content">
        ' . $this->post->content . '
    </section>
</article>

<div id="social">
    <iframe allowtransparency="true" frameborder="0" scrolling="no"
        src="https://platform.twitter.com/widgets/tweet_button.html?url='.$url.'"
        style="width:120px; height:21px;"></iframe>

    <iframe src="//www.facebook.com/plugins/like.php?href=' . $url . '&amp;send=false&amp;layout=button_count&amp;width=150&amp;show_faces=false&amp;font=arial&amp;colorscheme=light&amp;action=like&amp;height=21&amp;appId=173861706020705" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:150px; height:21px;" allowTransparency="true"></iframe>
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
